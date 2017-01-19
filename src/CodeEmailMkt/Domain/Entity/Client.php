<?php

namespace CodeEmailMkt\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="clients")
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $cpf;

    /**
     * @ORM\OneToMany(targetEntity="TargetMkt\Domain\Entity\Address", cascade="persist", mappedBy="client")
     */
    protected $addresses;

    public function __construct()
    {
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection;
    }

    /**
     * @return int|null
     */
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
        $this->addresses->add($address);
    }

    public function getAddresses()
    {
        return $this->addresses;
    }
}