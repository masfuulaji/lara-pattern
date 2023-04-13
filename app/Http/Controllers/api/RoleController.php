<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleRepository;
    protected $roleService;

    public function __construct(RoleRepository $roleRepository, RoleService $roleService)
    {
        $this->roleRepository = $roleRepository;
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleRepository->all();

        return response()->json($roles);
    }

    public function store(Request $request)
    {
        $role = $this->roleService->create($request->all());

        return response()->json($role);
    }

    public function show($id)
    {
        try {
            $role = $this->roleRepository->findId($id);
            return response()->json($role);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Role not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $role = $this->roleService->update($request->all(), $id);
            return response()->json($role);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Role not found'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->roleService->delete($id);
            return response()->json(['message' => 'Role deleted successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Role not found'], 404);
        }
    }
}
