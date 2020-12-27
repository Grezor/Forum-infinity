<?php

namespace Model;

class Posts {
    
    private $id;
    private $name;
    private $description;
    private $categorie;
    private $user;
    private $createdAt;
    private $updateAt;
    private $closed;
    private $deleted;
    private $lastMessage;
    private $report;

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

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    public function getClosed()
    {
        return $this->closed;
    }

    public function getDeleted()
    {
        return $this->deleted;
    }

    public function getLastMessage()
    {
        return $this->lastMessage;
    }

    public function getReport()
    {
        return $this->report;
    }
}