<?php

namespace App\model;
use PDO;
use App\Controller\Database\DatabaseController;

class Users {
    
    private ?int $id;
    private ?string $name = null;
    private ?string $username = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?int $role;
    private $avatar;
    private $description;
    private $createdAt;
    private $lastConnection;
    private $deleteAccount;
    private $db;
    private $table = 'users';
    
    public function __construct(DatabaseController $db)
    {
        $this->db = $db;
    }

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

    public function getUsernameByNameOrEmail($db, $name, $email)
    {
        $requeteSelect = $db->prepare('SELECT * FROM users WHERE email = :email OR username = :name');
        $requeteSelect->bindValue(':name', $name);
        $requeteSelect->bindValue(':email', $email);
        $requeteSelect->execute();
        return $requeteSelect->fetch();
    }

    public function registerUser($db, $user)
    {
        $requeteInsert = $db->prepare(
            'INSERT INTO users (name, password, email, email_token, register_at, connection_at, rank) 
            VALUES (:name, :password, :email, :emailToken, NOW(), NULL, 1)');
    
        $requeteInsert->bindValue(':name', $user['name'], PDO::PARAM_STR);
        $requeteInsert->bindValue(':password', $user['password'], PDO::PARAM_STR);
        $requeteInsert->bindValue(':email', $user['email'], PDO::PARAM_STR);
        $requeteInsert->bindValue(':emailToken', $user['emailToken'], PDO::PARAM_STR);
        $requeteInsert->execute();
    
        return intval($db->lastInsertId());
    }

    public function getUserByNameOrEmail($db, $name, $email)
    {
        $reqSelect = $db->prepare(
            'SELECT id, name, password, email, email_token, register_at, connection_at, rank
            FROM users
            WHERE name = :name OR
                email = :email
            LIMIT 0, 1');

        // La fonction bindValue est plus lisible et plus précise
        $reqSelect->bindValue(':name', $name, PDO::PARAM_STR);
        $reqSelect->bindValue(':email', $email, PDO::PARAM_STR);

        // Exécution de la requête
        $reqSelect->execute();

        // On retourne le résultat
        return $reqSelect->fetch();
    }
}