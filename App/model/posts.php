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
}