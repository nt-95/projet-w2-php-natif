<?php

namespace App\Manager;

use App\Fram\Factories\PDOFactory;

abstract class BaseManager
{
    protected $db;

    public function __construct()
    {
        $pdo = new PDOFactory();
        $this->db = $pdo->getDb();
    }
}