<?php
namespace CodeEmailMkt\Application\Middleware;
use CodeEmailMkt\Domain\Service\BootstrapInterface;
use CodeEmailMkt\Domain\Service\FlashMessageInterface;
use CodeEmailMkt\Infrastructure\Bootstrap;
use Interop\Container\ContainerInterface;
class BootstrapMiddlewareFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $bootstrap = $container->get(BootstrapInterface::class);
        $flash 	   = $container->get(FlashMessageInterface::class);
        return new BootstrapMiddleware($bootstrap, $flash);
    }
}