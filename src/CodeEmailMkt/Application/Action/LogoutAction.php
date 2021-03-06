<?php

namespace CodeEmailMkt\Application\Action;

use CodeEmailMkt\Domain\Service\AuthServiceInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router;

class LogoutAction
{
    private $router;
    private $authService;

    public function __construct(
        Router\RouterInterface              $router, 
        AuthServiceInterface                $authService
    )
    {
        $this->router       = $router;
        $this->authService  = $authService;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
    	$this->authService->destroy();
        return new RedirectResponse(
            $this->router->generateUri('auth.login')
        );
    }
}
