<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userRepository;
    protected $userService;

    public function __construct(UserRepository $userRepository, AuthService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = $this->userService->register($data);

        return response()->json($user, 201);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = $this->userService->login($data);

        return response()->json($user, 201);
    }

    public function logout()
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $user->tokens()->delete();

        return response()->json(['message' => 'Logged out'], 200);
    }
}
