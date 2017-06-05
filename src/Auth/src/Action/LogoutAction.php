<?php
namespace Auth\Action;

use Auth\MyAuthAdapter;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class LogoutAction implements ServerMiddlewareInterface
{
    private $auth;
    private $authAdapter;

    public function __construct(
        AuthenticationService $auth,
        MyAuthAdapter $authAdapter
    ) {
        $this->auth        = $auth;
        $this->authAdapter = $authAdapter;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {

        $result = $this->auth->clearIdentity();
        return new RedirectResponse('/');
    }
}