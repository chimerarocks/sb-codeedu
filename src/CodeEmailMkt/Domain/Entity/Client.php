<?php

namespace CodeEmailMkt\Domain\Entity;

class Client
{
    protected $id;

    protected $name;

    protected $email;

    protected $cpf;

    protected $addresses;

    public function __construct()
    {
        $this->addresses = [];
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function addAddress($address)
    {
        array_push($this->addresses, $address);
    }

    public function getAddresses()
    {
        return $this->addresses;
    }
}