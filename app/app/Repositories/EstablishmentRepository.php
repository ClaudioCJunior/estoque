<?php

namespace App\Repositories;

use App\Models\Establishment;
use App\Interfaces\Repositories\IEstablishmentRepository;

class EstablishmentRepository implements IEstablishmentRepository
{

    public function getAllByUserPaginated(int $perPage, int $userId)
    {
        return Establishment::join('establishment_users', 'establishments.id', '=', 'establishment_users.establishment_id')
            ->where('establishment_users.user_id', $userId)
            ->select('establishments.*')
            ->paginate($perPage);
    }

    public function findByIdAndUser(int $id, int $userId): ?Establishment
    {
        return Establishment::join('establishment_users', 'establishments.id', '=', 'establishment_users.establishment_id')
            ->where('establishment_users.user_id', $userId)
            ->where('establishments.id', $id)
            ->select('establishments.*')
            ->first();
    }

    public function create(array $data): Establishment
    {
        return Establishment::create($data);
    }

    public function update(Establishment $establishment, array $data): bool
    {
        return $establishment->update($data);
    }

    public function delete(Establishment $establishment): bool
    {
        return $establishment->delete();
    }
}