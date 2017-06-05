<?php
namespace Auth\Factory;

use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Exception;
use Auth\Action\AuthAction;

class AuthActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new AuthAction($container->get(AuthenticationService::class));
    }
}