<?php

namespace CodeEmailMkt\Application\Action;

use CodeEmailMkt\Domain\Service\AuthServiceInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

class LogoutFactory
{
	public function __invoke(ContainerInterface $container)
	{
		$router 		= $container->get(RouterInterface::class);
		$authService 	= $container->get(AuthServiceInterface::class);
		return new LogoutAction($router, $authService);
	}
}