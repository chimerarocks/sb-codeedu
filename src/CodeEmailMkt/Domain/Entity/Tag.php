<?php

namespace CodeEmailMkt\Domain\Entity;

use CodeEmailMkt\Domain\Entity\Client;
use Doctrine\Common\Collections\ArrayCollection;

class Tag
{
	private $id;

	private $name;

	private $clients;

	public function __construct()
	{
		$this->clients = new ArrayCollection();
	}

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

	public function getClients()
	{
		return $this->clients;
	}

	public function addClient(Client $client)
	{
		$this->clients->add($client);
		return $this;
	}
}