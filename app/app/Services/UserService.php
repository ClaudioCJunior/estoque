<?php

namespace App\Services;

use App\Interfaces\Repositories\IUserRepository;
use App\Interfaces\Services\IUserService;
use App\Models\User;

class UserService implements IUserService
{
    private IUserRepository $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): array
    {
        return $this->repository->getAll();
    }

    public function getById(int $id): ?User
    {
        return $this->repository->getById($id);
    }

    public function create(array $data): User
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}