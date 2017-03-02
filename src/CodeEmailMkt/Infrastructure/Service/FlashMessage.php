<?php

namespace CodeEmailMkt\Infrastructure\Service;

use CodeEmailMkt\Domain\Service\FlashMessageInterface;
use Zend\Mvc\Controller\Plugin\FlashMessenger;

class FlashMessage implements FlashMessageInterface {
	
	private $flashMessenger;

	public function __construct(FlashMessenger $flashMessenger)
	{
		$this->flashMessenger = $flashMessenger;
	}

	public function setNamespace(string $name = __NAMESPACE__)
	{
		$this->flashMessenger->setNamespace($name);
		return $this;
	}

	public function setMessage($key, string $value)
	{
		switch ($key) {
			case self::SUCCESS_MESSAGE:
				$this->flashMessenger->addSuccessMessage($value);
				break;
			
		}
		return $this;
	}

	public function getMessage($key)
	{
		$result = null;
		switch ($key) {
			case self::SUCCESS_MESSAGE:
				$result = $this->flashMessenger->getCurrentSuccessMessages();
				break;
			
		}

		return count($result) ? $result[0] : null;
	}

}