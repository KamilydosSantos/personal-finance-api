<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    
    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        try {
            $result = $this->authService->login($data);
            return response()->json($result, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authService->logout($user);

        return response()->json(['message' => 'Logout realizado com sucesso']);
    }
}
