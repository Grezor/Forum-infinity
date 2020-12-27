<?php

namespace Model;

class Forums {
    
    private $id;
    private $name;
    private $description;
    private $categorieId;
    private $createdAt;
    private $postCount;
    private $updatedAt;

    public function __construct()
    {

    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCategorieId()
    {
        return $this->categorieId;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getPostCount()
    {
        return $this->postCount;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}