<?php

namespace App\Data;

class EstablishmentData
{
    public ?int $id;
    public string $name;
    public string $address;

    public function __construct(string $name, string $address, int $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }
}