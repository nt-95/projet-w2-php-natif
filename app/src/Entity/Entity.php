<?php

namespace App\Entity;
use App\Manager\PDO\PDOFactory;

class Entity
{
    public function save() {
        $pdo = new PDOFactory();
        $pdo = $pdo->getBdd();
        foreach ($this as $key => $value) {
            return "$key => $value";
        }
    }

}