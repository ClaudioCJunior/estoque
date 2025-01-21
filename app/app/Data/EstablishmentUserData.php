<?php

namespace App\Data;

class EstablishmentUserData
{
    public ?int $id;
    public int $establishment_id;
    public int $user_id;

    public function __construct(int $establishment_id, int $user_id, int $id = null)
    {
        $this->id = $id;
        $this->establishment_id = $establishment_id;
        $this->user_id = $user_id;
    }
}