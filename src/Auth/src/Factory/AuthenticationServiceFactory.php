<?php
namespace Auth\Factory;

use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Auth\MyAuthAdapter;

class AuthenticationServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new AuthenticationService(
            null,
            $container->get(MyAuthAdapter::class)
        );
    }
}