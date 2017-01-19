<?php
namespace CodeEmailMkt\Application\Middleware;
use Interop\Container\ContainerInterface;
use CodeEmailMkt\Infrastructure\Bootstrap;
class BootstrapMiddlewareFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $bootstrap = new Bootstrap();
        return new BootstrapMiddleware($bootstrap);
    }
}