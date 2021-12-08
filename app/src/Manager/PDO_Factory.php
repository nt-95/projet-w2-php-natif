<?php

namespace App\Manager\PDO;

use App\Manager\JSONResponse;
use PDO;

class PDOFactory
{
    private $bdd;

    public function __construct()  {
        try {
            $this->bdd = new PDO('mysql:host=db;dbname=mySpace', 'root', 'password');
        }
        catch (\PDOException $e) {
            echo(JSONResponse::internalServerError());
            die('Error :' . $e->getMessage());

        }
    }

    public function getBdd() {
        return $this->bdd;
    }
}