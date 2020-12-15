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
   
    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function id()
    {
        return $this->$id;
    }

    public function username()
    {
        return $this->$username;
    }

    public function email()
    {
        return $this->$email;
    }

    public function password()
    {
        return $this->$password;
    }

    public function role(){
        return $this->$role;
    }

    public function avatar(){
        return $this->$avatar;
    }

    public function description(){
        return $this->$description;
    }

    public function createdAt(){
        return $this->$createdAt;
    }

    public function lastConnection(){
        return $this->$lastConnection;
    }

    public function deleteAccount(){
        return $this->$deleteAccount;
    }
}