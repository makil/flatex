<?php

namespace Admin;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
                Action\InfoAction::class => Action\InfoAction::class,
            ],
            'factories'  => [
                Action\HomePageAction::class => Factory\HomePageFactory::class,
                Action\InstallAction::class => Factory\InstallActionFactory::class, 
                Action\PageAction::class => Factory\PageActionFactory::class,
                Action\LayoutAction::class => Factory\LayoutActionFactory::class,                
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'admin'    => [__DIR__ . '/../templates/admin'],
                'admin.error'  => [__DIR__ . '/../templates/error'],
                'admin.layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }
}
