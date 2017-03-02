<?php
declare(strict_types = 1);

namespace CodeEmailMkt\Domain\Service;

interface FlashMessageInterface
{
	const SUCCESS_MESSAGE = 1;

	public function setNamespace(string $name);

	public function setMessage($key, string $value);

	public function getMessage($key);
}