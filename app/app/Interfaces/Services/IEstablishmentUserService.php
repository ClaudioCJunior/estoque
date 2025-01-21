<?php

namespace App\Interfaces\Services;

use App\Models\EstablishmentUser;
use App\Data\EstablishmentUserData;

interface IEstablishmentUserService
{
    public function getAll();
    public function create(EstablishmentUserData $data);
    public function update(EstablishmentUserData $data, int $id);
    public function delete(int $id);
    public function getById(int $id);
    public function getByUserId(int $userId);
    public function getByEstablishmentId(int $establishmentId);
}