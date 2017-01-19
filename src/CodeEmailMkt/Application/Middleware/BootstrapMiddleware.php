<?php
namespace CodeEmailMkt\Application\Middleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use CodeEmailMkt\Domain\Service\BootstrapInterface;
use CodeEmailMkt\Domain\Service\FlashMessageInterface;
class BootstrapMiddleware
{
    private $bootstrap;

    public function __construct(BootstrapInterface $bootstrap)
    {
        $this->bootstrap = $bootstrap;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $this->bootstrap->create();
        return $next($request, $response);
    }
}