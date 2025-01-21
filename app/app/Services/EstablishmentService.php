<?php

namespace App\Services;

use App\Models\Establishment;
use App\Data\EstablishmentData;
use App\Data\EstablishmentUserData;
use App\Interfaces\Repositories\IEstablishmentRepository;
use App\Interfaces\Repositories\IEstablishmentUserRepository;
use App\Interfaces\Services\IEstablishmentService;
use App\Interfaces\Services\IEstablishmentUserService;
use App\Repositories\EstablishmentRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EstablishmentService implements IEstablishmentService
{
    private IEstablishmentRepository $repository;
    private IEstablishmentUserRepository $establishmentUserRepository;

    public function __construct(
        IEstablishmentRepository $repository, 
        IEstablishmentUserRepository $establishmentUserRepository)
    {
        $this->repository = $repository;
        $this->establishmentUserRepository = $establishmentUserRepository;
    }

    public function getAllByUserPaginated(int $perPage, int $userId)
    {
        return $this->repository->getAllByUserPaginated($perPage, $userId);
    }

    public function create(EstablishmentData $data) : Establishment
    {
        return DB::transaction(function () use ($data) {

            $establishment = $this->repository->create([
                'name' => $data->name,
                'address' => $data->address,
            ]);

            if(!$establishment){
                throw new \Exception('Error creating establishment');
            }

            $user = Auth::user();

            $establishmentUser = $this->establishmentUserRepository->create([
                'establishment_id' => $establishment->id,
                'user_id' => $user->id,
            ]);

            if(!$establishmentUser){
                throw new \Exception('Error creating establishment user');
            }

            return $establishment;
        });
    }

    public function update(EstablishmentData $data, int $id, int $userId) : ?Establishment
    {
        return DB::transaction(function () use ($data, $id, $userId) {
            $establishment = $this->getByIdAndUser($id, $userId);

            return $this->repository->update($establishment, [
                'name' => $data->name,
                'address' => $data->address,
            ]);
        });
    }

    public function delete(int $id, int $userId) : bool
    {
        return DB::transaction(function () use ($id, $userId) {
            $establishment = $this->getByIdAndUser($id, $userId);

            $this->establishmentUserRepository->getByEstablishmentId($establishment->id)->each(function($establishmentUser){
                $this->establishmentUserRepository->delete($establishmentUser->id);
            });

            return $$this->repository->delete($establishment);
        });
    }

    public function getByIdAndUser(int $id, int $userId): ?Establishment
    {
        return $this->repository->findByIdAndUser($id, $userId);

        if(!$establishment){
            throw new \Exception('Establishment not found');
        }

        return $establishment;
    }
}