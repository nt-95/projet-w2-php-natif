<?php

namespace App\Fram\Factories;

use PDO;

class PDOFactory
{
    private $db;

    public function __construct()  {
        try {
            $this->db = new PDO('mysql:host=db;dbname=MySpace', 'root', 'password');
        }
        catch (PDOException $e) {
            die('Error :' . $e->getMessage());

        }
    }

    public function getDb() {
        return $this->db;
    }
}