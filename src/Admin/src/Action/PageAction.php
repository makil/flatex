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
use Admin\File\FileSystemHelper;

class PageAction implements ServerMiddlewareInterface
{
    private $fileSystemHelper;

    private $template;

    public function __construct(Template\TemplateRendererInterface $template, FileSystemHelper $fileSystemHelper)
    {
        $this->fileSystemHelper   = $fileSystemHelper;
        $this->template = $template;
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
        return new HtmlResponse($this->template->render('admin-page::page-add'));
    }

    public function editAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = $request->getAttribute('id', false);
        if (! $id) {
            throw new \InvalidArgumentException('id parameter must be provided');
        }

        return new HtmlResponse(
            $this->template->render('admin-page::page-edit', ['id' => $id])
        );
    }
}
