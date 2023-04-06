<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository
{
    /**
     * @param int $id
     * @return User
     */
    public function find(int $id): User
    {
        return User::findOrFail($id);
    }
}