<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository
{
    // find user by id
    public function findId(int $id): User
    {
        return User::findOrFail($id);
    }

    // find user where
    public function findWhere(string $column, string $value): User
    {
        return User::where($column, $value)->firstOrFail();
    }
    
    // create new user
    public function create(array $data): User
    {
        return User::create($data);
    }
}