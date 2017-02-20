<?php

namespace CodeEmailMkt\Application\Middleware;

use Interop\Container\ContainerInterface;

class TwigMiddlewareFactory 
{
	public function __invoke(ContainerInterface $container)
	{
		$twigRenderer = $container->get(
			\Zend\Expressive\Template\TemplateRendererInterface::class
		);
		$twigEnv = $twigRenderer->getTemplate();
		$helperManager = $container->get(
			\Zend\View\HelperPluginManager::class
		);
		return new TwigMiddleware($twigEnv, $helperManager);
	}
}