<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function create(array $data)
    {
        $role = $this->roleRepository->create($data);

        $role->syncPermissions($data['permissions']);

        return $role;
    }

    public function update(array $data, $id)
    {
        $role = $this->roleRepository->update($data, $id);

        $role->syncPermissions($data['permissions']);

        return $role;
    }

    public function delete($id)
    {
        $this->roleRepository->delete($id);
    }
}
