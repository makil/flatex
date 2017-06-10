<?php

namespace Admin\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use Zend\Expressive\Plates\PlatesRenderer;
use Zend\Expressive\Twig\TwigRenderer;
use Zend\Expressive\ZendView\ZendViewRenderer;
use Admin\Service\PageService;
use Admin\Model\LayoutDTO;

class LayoutAction implements ServerMiddlewareInterface
{
    private $pageService;
    private $template;

    public function __construct(Template\TemplateRendererInterface $template, PageService $pageService)
    {
        $this->pageService = $pageService;
        $this->template    = $template;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {

        switch ($request->getAttribute('action', 'index')) {
            case 'index':
                return $this->indexAction($request, $delegate);
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
        $data['layouts'] = $this->pageService->getLayouts();

        return new HtmlResponse($this->template->render('admin-layout::layout-index', $data));
    }

    public function editAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = $request->getAttribute('id', false);
        if (! $id) {
            throw new \InvalidArgumentException('id parameter must be provided');
        }
        $content = file_get_contents($this->pageService->getLayoutDirectory() . '/' . $id, FILE_USE_INCLUDE_PATH);
        $layout = new LayoutDTO($id, $content );
        if ($request->getMethod() === 'POST') {
            $params = $request->getParsedBody();
            $layout = new LayoutDTO($id, $params['content'] );
            if (!empty($params['name'])) {
                $this->pageService->updateLayout($layout);
                return new RedirectResponse('/admin/layout/edit/' . $params['name']);
            }
        }
        return new HtmlResponse(
            $this->template->render('admin-layout::layout-edit', ['layout' => $layout])
        );
    }
}
