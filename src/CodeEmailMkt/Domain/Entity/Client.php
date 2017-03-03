<?php
declare(strict_types = 1);

namespace CodeEmailMkt\Domain\Entity;

use CodeEmailMkt\Domain\Entity\Address;
use CodeEmailMkt\Domain\Entity\Tag;
use Doctrine\Common\Collections\ArrayCollection;

class Client
{
    protected $id;

    protected $name;

    protected $email;

    protected $cpf;

    protected $addresses;

    protected $tags;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
        $this->tags      = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function addAddress(Address $address)
    {
        $this->addresses->add($address);
        return $this;
    }

    public function getAddresses()
    {
        return $this->addresses;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function addTag(Tag $tag)
    {
        $this->tags->add($tag);
        return $this;
    }

    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    public function addTags($tags)
    {
        foreach ($tags as $tag) {
            $tag->addClient($this);
            $this->addTag($tag);
        }
        return $this;
    }

    public function removeTags($tags)
    {
        foreach ($tags as $tag) {
            $tag->removeClient($this);
            $this->removeTag($tag);
        }
        return $this;    
    }
}