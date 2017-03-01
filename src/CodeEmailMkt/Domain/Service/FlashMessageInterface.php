<?php

namespace CodeEmailMkt\Domain\Service;

interface FlashMessageInterface
{
	const SUCCESS_MESSAGE = 1;

	public function setNamespace($name);

	public function setMessage($key, $value);

	public function getMessage($key);
}