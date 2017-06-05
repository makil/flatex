<?php
namespace Auth\Factory;

use Auth\MyAuthAdapter;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Expressive\Template\TemplateRendererInterface;
use Auth\Action\LogoutAction;

class LogoutActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new LogoutAction(
            $container->get(AuthenticationService::class),
            $container->get(MyAuthAdapter::class)
        );
    }
}