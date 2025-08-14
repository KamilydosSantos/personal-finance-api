<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findById(int $id): ?User
    {
        return $this->model->find($id);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }

    public function create(array $data): User
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $user = $this->findById($id);
        if (!$user) return false;

        return $user->update($data);
    }

    public function delete(int $id): bool
    {
        $user = $this->findById($id);
        if (!$user) return false;

        return (bool) $user->delete();
    }

    public function getAuthenticatedUser(): ?User
    {
        return auth()->user();
    }
}
