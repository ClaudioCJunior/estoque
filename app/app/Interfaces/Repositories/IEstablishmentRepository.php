<?php

namespace App\Interfaces\Repositories;

use App\Models\Establishment;

interface IEstablishmentRepository
{
    public function getAllByUserPaginated(int $perPage, int $userId);
    public function findByIdAndUser(int $id, int $userId): ?Establishment;
    public function create(array $data): Establishment;
    public function update(Establishment $establishment, array $data): bool;
    public function delete(Establishment $establishment): bool;
}