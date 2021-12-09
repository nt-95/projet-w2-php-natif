<?php

namespace App\Fram\Factories;

use App\Manager\JSONResponse;
use PDO;

class PDOFactory
{
    private $db;

    public function __construct()  {
        try {
            $this->db = new PDO('mysql:host=db;dbname=MySpace', 'root', 'password');
        }
        catch (\PDOException $e) {
            // echo(JSONResponse::internalServerError());
            die('Error :' . $e->getMessage());

        }
    }

    public function getDb() {
        return $this->db;
    }
}