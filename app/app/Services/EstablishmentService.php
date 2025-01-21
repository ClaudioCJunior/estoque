<?php

namespace App\Services;

use App\Models\Establishment;
use App\Data\EstablishmentData;

class EstablishmentService
{
    public function getAllEstablishments()
    {
        return Establishment::paginate(10);
    }

    public function createEstablishment(EstablishmentData $data)
    {
        return Establishment::create([
            'name' => $data->name,
            'address' => $data->address,
        ]);
    }

    public function updateEstablishment(EstablishmentData $data, Establishment $establishment)
    {
        return $establishment->update([
            'name' => $data->name,
            'address' => $data->address,
        ]);
    }

    public function deleteEstablishment(Establishment $establishment)
    {
        return $establishment->delete();
    }

    public function getEstablishmentById(Establishment $establishment)
    {
        return $establishment;
    }
}