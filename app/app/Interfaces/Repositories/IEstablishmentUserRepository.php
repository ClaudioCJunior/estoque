<?php

namespace App\Interfaces\Repositories;

use App\Models\EstablishmentUser;

interface IEstablishmentUserRepository
{
    public function getAll();
    public function findById(int $id): ?EstablishmentUser;
    public function create(array $data): EstablishmentUser;
    public function update(EstablishmentUser $establishmentUser, array $data): bool;
    public function delete(EstablishmentUser $establishmentUser): bool;
    public function getByUserId(int $userId);
    public function getByEstablishmentId(int $establishmentId);
}