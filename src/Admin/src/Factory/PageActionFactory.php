<?php

namespace Admin\Factory;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Admin\Action\PageAction;
use Admin\Service\PageService;

class PageActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $pageService = new PageService();
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;
        $twigEnvironment = $container->get(\Twig_Environment::class);
        return new PageAction($template, $pageService, $twigEnvironment);
    }
}
