<?php

namespace CodeEmailMkt\Infrastructure;

use CodeEmailMkt\Infrastructure\Bootstrap;
use Interop\Container\ContainerInterface;

class BootstrapFactory
{
	public function __invoke(ContainerInterface $container)
	{
		return new Bootstrap();
	}
}