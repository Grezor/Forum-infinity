<?php

namespace App\Model;

class Model extends DatabaseController {

    private $db;
    private $table;

    public function requete(string $sql, array $attributs = null)
    {
        // on recuperer la connexion a la base de donnée
        $this->db = $db->getPDO();
        // on vérifie si on a des attributs
        if ($attributs !== null) {
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        }else{
            return $thiq->db->query($sql);
        }
    }
}