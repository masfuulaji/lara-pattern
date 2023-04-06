<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

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
            $user = $this->userRepository->find($id);
            return response()->json($user);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    
}
