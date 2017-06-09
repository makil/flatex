<?php

namespace Admin\Factory;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Admin\Action\LayoutAction;
use Admin\Service\PageService;

class LayoutActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $pageService = new PageService();
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

        return new LayoutAction($template, $pageService);
    }
}
