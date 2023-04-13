<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository
{
    // find role by id
    public function findId(int $id): Role
    {
        return Role::findOrFail($id);
    }

    // find role where
    public function findWhere(string $column, string $value): Role
    {
        return Role::where($column, $value)->firstOrFail();
    }

    // get all roles
    public function all()
    {
        return Role::all();
    }

    // create new role
    public function create(array $data): Role
    {
        return Role::create(['name' => $data['name']]);
    }

    // update role
    public function update(array $data, $id): Role
    {
        $role = $this->findId($id);
        $role->update(['name' => $data['name']]);

        return $role;
    }

    // delete role
    public function delete($id): void
    {
        $role = $this->findId($id);
        $role->delete();
    }
}
