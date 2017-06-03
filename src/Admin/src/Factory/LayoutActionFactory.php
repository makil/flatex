<?php

namespace Admin\Factory;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Admin\Action\LayoutAction;
use Admin\File\FileSystemHelper;

class LayoutActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $fileSystemHelper = new FileSystemHelper(FileSystemHelper::DEFAULT_LAYOUT_DIRECTORY);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

        return new LayoutAction($template, $fileSystemHelper);
    }
}
