<?php

namespace App\Entity;
use App\Fram\Factories\PDOFactory;

class Entity
{
    public function save() {
        $pdo = new PDOFactory();
        $pdo = $pdo->getDb();
        foreach ($this as $key => $value) {
            return "$key => $value";
        }
    }

}
