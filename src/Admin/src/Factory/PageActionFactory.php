<?php

namespace Admin\Factory;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Admin\Action\PageAction;
use Admin\File\FileSystemHelper;

class PageActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $fileSystemHelper = new FileSystemHelper(FileSystemHelper::DEFAULT_PAGE_DIRECTORY);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;
        $twigEnvironment = $container->get(\Twig_Environment::class);
        return new PageAction($template, $fileSystemHelper, $twigEnvironment);
    }
}
