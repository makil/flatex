<?php

namespace Admin\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use Zend\Expressive\Plates\PlatesRenderer;
use Zend\Expressive\Twig\TwigRenderer;
use Zend\Expressive\ZendView\ZendViewRenderer;
use Zend\Diactoros\Response\RedirectResponse;
use Admin\File\FileSystemHelper;
use Admin\Model\PageDTO;

class PageAction implements ServerMiddlewareInterface
{
    private $fileSystemHelper;
    private $twigEnvironment;
    private $template;

    public function __construct(Template\TemplateRendererInterface $template, FileSystemHelper $fileSystemHelper, $twigEnvironment)
    {
        $this->fileSystemHelper   = $fileSystemHelper;
        $this->template = $template;
        $this->twigEnvironment = $twigEnvironment;
    }
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        switch ($request->getAttribute('action', 'index')) {
            case 'index':
                return $this->indexAction($request, $delegate);
            case 'add':
                return $this->addAction($request, $delegate);
            case 'edit':
                return $this->editAction($request, $delegate);
            default:
                // Invalid; thus, a 404!
                return new EmptyResponse(StatusCode::STATUS_NOT_FOUND);
        }
    }

    public function indexAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
         $data = [];

        $data['pages'] = $this->fileSystemHelper->getFiles();
        return new HtmlResponse($this->template->render('admin-page::page-index', $data));
    }

    public function addAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $page = new PageDTO('name', 'template', 'title', 'content');
        if ($request->getMethod() === 'POST') {
            $params = $request->getParsedBody();
            if (!empty($params['name'])) {
                $page = new PageDTO($params['name'], $params['template'], $params['title'], $params['content']);
                $this->fileSystemHelper->createPage($page);
                return new RedirectResponse('/admin/page/edit/' . $params['name']);
            }
        }
        $viewParams = ['page' => $page];
        return new HtmlResponse($this->template->render('admin-page::page-add', $viewParams));
    }

    public function editAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = $request->getAttribute('id', false);
        if (! $id) {
            throw new \InvalidArgumentException('id parameter must be provided');
        }
        
        $this->twigEnvironment->getLoader()->setPaths(__DIR__ .'/../../../../data/templates/pages');
        $template = $this->twigEnvironment->loadTemplate($id);
        $title = $template->renderBlock('title', []);
        $content = $template->renderBlock('content', []);
        $page = new PageDTO($id, 'default', $title, $content);
        if ($request->getMethod() === 'POST') {
            $params = $request->getParsedBody();
            if (!empty($params['name'])) {
                $page = new PageDTO($params['name'], $params['template'], $params['title'], $params['content']);
                $this->fileSystemHelper->updatePage($page);
                return new RedirectResponse('/admin/page/edit/' . $params['name']);
            }
        }
        return new HtmlResponse(
            $this->template->render('admin-page::page-edit', ['page' => $page])
        );
    }
}
