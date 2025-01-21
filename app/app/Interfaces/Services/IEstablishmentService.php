<?php

namespace App\Interfaces\Services;

use App\Models\Establishment;
use App\Data\EstablishmentData;

interface IEstablishmentService
{
    public function getAllByUserPaginated(int $perPage, int $userId);
    public function create(EstablishmentData $data) : Establishment;
    public function update(EstablishmentData $data, int $id, int $userId): ?Establishment;
    public function delete(int $id, int $userId): bool;
    public function getByIdAndUser(int $id, int $userId): ?Establishment;
}