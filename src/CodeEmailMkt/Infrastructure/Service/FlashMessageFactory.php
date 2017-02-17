<?php

namespace CodeEmailMkt\Infrastructure\Service;

use Interop\Container\ContainerInterface;

class FlashMessageFactory
{
	public function __invoke(ContainerInterface $container)
	{
		$session = $container->get(\Aura\Session\Session::class);
		return new FlashMessage($session);
	}
}