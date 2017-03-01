<?php

namespace CodeEmailMkt\Application\Action;

use CodeEmailMkt\Application\Action\LoginPageAction;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class LoginPageFactory
{
	public function __invoke(ContainerInterface $container)
	{
		$router = $container->get(RouterInterface::class);
		$template = ($container->has(TemplateRendererInterface::class))
			? $container->get(TemplateRendererInterface::class)
			: null;
		return new LoginPageAction($router, $template);
	}
}