<?php

namespace Model;

class Topics {
    
    private $id;
    private $title;
    private $description;
    private $author;
    private $createdAt;
    private $updatedAt;
    private $deleted;
    private $lastMessage;

    public function __construct()
    {
        
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getDeleted()
    {
        return $this->deleted;
    }

    public function getLastMessage()
    {
        return $this->lastMessage;
    }
}