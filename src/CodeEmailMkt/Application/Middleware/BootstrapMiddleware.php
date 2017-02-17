<?php
namespace CodeEmailMkt\Application\Middleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use CodeEmailMkt\Domain\Service\BootstrapInterface;
use CodeEmailMkt\Domain\Service\FlashMessageInterface;

class BootstrapMiddleware
{
    private $bootstrap;

    private $flash;

    public function __construct(BootstrapInterface $bootstrap, FlashMessageInterface $flash)
    {
        $this->bootstrap = $bootstrap;
        $this->flash = $flash;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $this->bootstrap->create();
        $request = $request->withAttribute('flash', $this->flash);
        return $next($request, $response);
    }
}