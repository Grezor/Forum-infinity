<?php

namespace App\model;
use PDO;

class Users {
    
    private $id;
    private $name;
    private $username;
    private $email;
    private $password;
    private $role;
    private $avatar;
    private $description;
    private $createdAt;
    private $lastConnection;
    private $deleteAccount;
    private $db;
    private $table = 'users';
   

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getLastConnection()
    {
        return $this->lastConnection;
    }

    public function getDeleteAccount()
    {
        return $this->deleteAccount;
    }

    public function getDb()
    {
        return $this->db;
    }
}