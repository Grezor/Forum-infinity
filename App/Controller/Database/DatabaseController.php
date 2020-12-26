<?php 
namespace App\Controller\Database;
use PDO;

class DatabaseController extends PDO {
    
    private static DatabaseController $pdo;
    
    public function __construct(string $dbname, string $host = 'localhost', string $username = 'root' , string $password = '')
    {
        parent::__construct(
            "mysql:dbname={$dbname};host={$host}", $username, $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
            ]
        );
    }

    public static function getPDO(): DatabaseController
    {
        return self::$pdo ??= new DatabaseController('forum2020poo', 'localhost', 'root', '');
    }


}