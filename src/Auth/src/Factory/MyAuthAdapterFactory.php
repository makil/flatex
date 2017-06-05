<?php
namespace Auth\Factory;

use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Auth\MyAuthAdapter;

class MyAuthAdapterFactory
{
    public function __invoke(ContainerInterface $container)
    {
        // Retrieve any dependencies from the container when creating the instance
        return new MyAuthAdapter(/* any dependencies */);
    }
}