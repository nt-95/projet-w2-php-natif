<?php

namespace App\Manager;

use App\Fram\Factories\PDOFactory;

abstract class BaseManager
{

    public function __construct()
    {
        $pdo = new PDOFactory();
        $this->db = $pdo->getDb();
    }
}