<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show($id)
    {
        try {
            $user = $this->userRepository->findId($id);
            return response()->json($user);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
