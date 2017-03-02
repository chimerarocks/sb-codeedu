<?php

namespace CodeEmailMkt\Infrastructure\Service;

use CodeEmailMkt\Infrastructure\Service\Bootstrap;
use Interop\Container\ContainerInterface;

class BootstrapFactory
{
	public function __invoke(ContainerInterface $container): Bootstrap
	{
		return new Bootstrap();
	}
}