<?php

namespace App\Services;

use App\Models\EstablishmentUser;
use App\Data\EstablishmentUserData;
use App\Interfaces\Repositories\IEstablishmentUserRepository;
use App\Interfaces\Services\IEstablishmentUserService;
use App\Repositories\EstablishmentRepository;
use App\Repositories\EstablishmentUserRepository;
use Illuminate\Support\Facades\DB;

class EstablishmentUserService implements IEstablishmentUserService
{
    private IEstablishmentUserRepository $repository;

    public function __construct(
        IEstablishmentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function create(EstablishmentUserData $data)
    {
        dump($data);

        DB::transaction(function () use ($data) {
            dd($data);
            return $this->repository->create([
                'establishment_id' => $data->establishment_id,
                'user_id' => $data->user_id,
            ]);
        });
    }

    public function update(EstablishmentUserData $data, int $id)
    {
        return DB::transaction(function () use ($data, $id) {
            $establishmentUser = $this->getById($id);
            return $this->repository->update($establishmentUser, [
                'establishment_id' => $data->establishment_id,
                'user_id' => $data->user_id,
            ]);
        });
    }

    public function delete(int $id)
    {
        return DB::transaction(function () use ($id) {
            $establishmentUser = $this->getById($id);
            return $this->repository->delete($establishmentUser);
        });
    }

    public function getById(int $id)
    {
        $establishmentUser = $this->repository->findById($id);
        if ($establishmentUser === null) {
            throw new \Exception('Establishment user not found');
        }
        return $establishmentUser;
    }

    public function getByUserId(int $userId)
    {
        return $this->repository->getByUserId($userId);
    }

    public function getByEstablishmentId(int $establishmentId)
    {
        return $this->repository->getByEstablishmentId($establishmentId);
    }
}