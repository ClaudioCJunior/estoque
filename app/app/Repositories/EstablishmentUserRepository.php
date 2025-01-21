<?php

namespace App\Repositories;

use App\Interfaces\Repositories\IEstablishmentUserRepository;
use App\Models\EstablishmentUser;

class EstablishmentUserRepository implements IEstablishmentUserRepository
{
    public function getAll()
    {
        return EstablishmentUser::paginate(10);
    }

    public function findById(int $id): ?EstablishmentUser
    {
        return EstablishmentUser::find($id);
    }

    public function create(array $data): EstablishmentUser
    {
        return EstablishmentUser::create($data);
    }

    public function update(EstablishmentUser $establishmentUser, array $data): bool
    {
        return $establishmentUser->update($data);
    }

    public function delete(EstablishmentUser $establishmentUser): bool
    {
        return $establishmentUser->delete();
    }

    public function getByUserId(int $userId)
    {
        return EstablishmentUser::where('user_id', $userId)->get();
    }

    public function getByEstablishmentId(int $establishmentId)
    {
        return EstablishmentUser::where('establishment_id', $establishmentId)->get();
    }
}