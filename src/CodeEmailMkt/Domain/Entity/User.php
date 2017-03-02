<?php
declare(strict_types = 1);

namespace CodeEmailMkt\Domain\Entity;

class User
{
	private $id;
	private $name;
	private $email;
	private $password;
	private $plainPassword;

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName(string $name)
	{
		$this->name = $name;
		return $this;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail(string $email)
	{
		$this->email = $email;
		return $this;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}

	public function getPlainPassword()
	{
		return $this->plainPassword;
	}

	public function setPlainPassword(string $plainPassword)
	{
		$this->plainPassword = $plainPassword;
		return $this;
	}

	/**
	 * Verifica se foi atribuída alguma senha,
	 * se sim gera uma criptografia a partir dela,
	 * se não gera uma criptografia aleatória
	 */
	public function generatePassword()
	{
		$password = $this->getPlainPassword() ? $this->getPlainPassword() : uniqid();
		$this->setPassword(password_hash($password, PASSWORD_BCRYPT));
	}
}