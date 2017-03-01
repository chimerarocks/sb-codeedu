<?php

namespace CodeEmailMkt\Domain\Service;

interface AuthServiceInterface
{
	public function authenticate($email, $password);

	public function isAuth();

	public function getUser();

	public function destroy();
}