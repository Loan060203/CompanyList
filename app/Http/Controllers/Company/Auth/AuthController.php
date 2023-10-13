<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\LoginRequest;
use App\Http\Request\RegisterRequest;
use App\Models\Company\Company;
use App\Models\User;
use App\Repositories\AuthRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    protected AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this-> authRepository = $authRepository;
    }

    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();

        $user=$this->authRepository->store($data);
        $token = $user->createToken('remember_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token'=>$token,
        ]);
    }
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return $this->httpUnauthorized(trans('errors.unauthenticated'));
        }

        Auth::user()->tokens()->delete();
        $token = Auth::user()->createToken('remember_token')->plainTextToken;

        return response()->json([
            'data' => $credentials,
            'token'=>$token,
        ]);
    }

    public function logout(): JsonResponse
    {

        Auth::user()->tokens()->delete();

        return response()->json(['Logout successfully']);
    }

    public function httpUnauthorized(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }

    protected function responseUserWithToken($token, $user): array
    {
        return [
            'user' => new $user,
            'token' => $token,
        ];
    }
}
