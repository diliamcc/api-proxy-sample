<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Contracts\IUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(private readonly IUserService $userService) {}

    public function login(LoginRequest $request): JsonResponse
    {
        $validCredentials = $this->userService->checkCredentials($request->validated());
        if (!$validCredentials) {
            return response()->json([
                'errors' => 'Invalid credentials',
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY
            ]);
        }

        $token = auth()->user()->createToken('api-sample')->plainTextToken;

        return response()->json(compact('token'));
    }

    public function logout(): JsonResponse
    {
        // Clean all tokens
        auth()->user()->tokens()->delete();
        Auth::logout();

        return response()->json([
            'message' => 'User logged out',
        ]);
    }
}
