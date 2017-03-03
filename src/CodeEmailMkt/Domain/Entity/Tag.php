<?php

namespace CodeEmailMkt\Domain\Entity;

use CodeEmailMkt\Domain\Entity\Client;
use Doctrine\Common\Collections\ArrayCollection;

class Tag
{
	private $id;

	private $name;

	private $clients;

	private $campaigns;

	public function __construct()
	{
		$this->clients = new ArrayCollection();
		$this->campaigns = new ArrayCollection();
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

	public function removeClient(Client $client)
	{
		$this->clients->removeElement($client);
		return $this;
	}

	public function getCampaigns()
	{
		return $this->campaigns;
	}

	public function addCampaign(Campaign $campaign)
	{
		$this->campaigns->add($campaign);
		return $this;
	}

	public function removeCampaign(Campaign $campaign)
	{
		$this->campaigns->removeElement($campaign);
		return $this;
	}
}