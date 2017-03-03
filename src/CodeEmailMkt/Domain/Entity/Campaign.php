<?php
declare(strict_types = 1);

namespace CodeEmailMkt\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Campaign
{
	private $id;

	private $name;

	private $template;

	private $tags;

	public function __construct()
	{
		$this->tags = new ArrayCollection();
	}

	public function getId()
	{
		return $this->id;
	}

	public function setName(string $name): Campaign
	{
		$this->name = $name;
		return $this;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setTemplate(string $template): Campaign
	{
		$this->template = $template;
		return $this;
	}

	public function getTemplate()
	{
		return $this->template;
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
            $this->addTag($tag);
        }
        return $this;
    }

    public function removeTags($tags)
    {
        foreach ($tags as $tag) {
            $this->removeTag($tag);
        }
        return $this;    
    }
}