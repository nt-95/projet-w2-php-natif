<?php
namespace App\Manager;

class JSONResponse
{
    public $json;

    public function __construct($status , $data, $errors) {
        $this->json = json_encode(array(
            'status' => $status,
            'data' => $data,
            'errors' => $errors,
        ), JSON_PRETTY_PRINT);
    }
}
