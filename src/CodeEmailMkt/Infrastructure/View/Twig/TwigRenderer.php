<?php

namespace CodeEmailMkt\Infrastructure\View\Twig;

use Twig_Environment as TwigEnvironment;
use Zend\Expressive\Twig\TwigRenderer as ZendTwigRenderer;

class TwigRenderer extends ZendTwigRenderer
{
	public function getTemplate()
	{
		return $this->template;
	}
}