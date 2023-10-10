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

    public function Register(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $token = $user->createToken('remember_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token'=>$token,
        ]);
    }
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

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
}
