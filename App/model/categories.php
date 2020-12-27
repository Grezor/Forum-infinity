<?php

namespace Model;

class Categories {
    
    private $id;
    private $name;
    private $categories;
    private $createdAt;
    private $updatedAt;
    private $deletedAt;

    public function __construct()
    {
        
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }
}