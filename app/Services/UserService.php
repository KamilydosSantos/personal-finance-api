<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }

    public function getUserById(int $id)
    {
        return $this->userRepository->findById($id);
    }

    public function getAuthenticatedUser()
    {
        $user = $this->userRepository->getAuthenticatedUser();

        if (!$user) {
            throw new \Exception('Usuário não autenticado');
        }

        return $user;
    }

    public function updateUser(int $userId, array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $updated = $this->userRepository->update($userId, $data);

        if (!$updated) {
            throw new \Exception('Erro ao atualizar usuário');
        }

        return $this->userRepository->findById($userId);
    }
}
