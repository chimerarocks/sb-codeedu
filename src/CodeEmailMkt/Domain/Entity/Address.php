<?php

namespace CodeEmailMkt\Domain\Entity;

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

    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }
}