<?php
namespace Admin\Action;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;

class InfoAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        ob_start();
        phpinfo();
        $data = ob_get_contents();
        ob_clean();
        return new HtmlResponse($data);
    }
}
