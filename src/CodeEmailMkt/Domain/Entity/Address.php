<?php
declare(strict_types = 1);

namespace CodeEmailMkt\Domain\Entity;

use CodeEmailMkt\Domain\Entity\Client;

class Address
{
    protected $id;

    protected $cep;

    protected $street;

    protected $city;

    protected $state;

    protected $client;

    public function getId()
    {
        return $this->id;
    }

    public function setCep(string $cep)
    {
        $this->cep = $cep;

        return $this;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setState(string $state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }
}