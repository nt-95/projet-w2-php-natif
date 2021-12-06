<?php

namespace App\Entity;

class Author
{

    public function __construct(string $name)
    {
        $this->name = $name;       
    }

    public function getName(): string
    {
        return $this->name;
    }

}