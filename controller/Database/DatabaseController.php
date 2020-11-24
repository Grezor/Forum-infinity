<?php 
namespace App\Database;

use PDO;

class DatabaseController {

    private $pdo;

    public function __construct($login, $password, $host, $databaseName)
    {
        $this->pdo = new PDO("mysql:dbname=$databaseName;host=$host, $login, $password");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    
    public function query($query, $params)
    {
        $req = $$this->pdo->prepare($query);
        $req->execute($params);
        return $req->fetch();
    }
}