<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\LoginRequest;
use App\Http\Request\RegisterRequest;
use App\Models\Staff;
use App\Models\User;
use App\Repositories\AuthRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


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
//        $token = $user->createToken('remember_token')->plainTextToken;

        return response()->json([
            'user' => $user,
//            'token'=>$token,
        ]);
    }
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->validated();

        if (!User::where('name', '=', $credentials['name'])->exists()) {
            return response()->json(['error' => trans('errors.name_invalid')], 401);
        }

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => trans('No.100005: パスワードが正しくありません')], 401);
        }

        $user=User::where('name', '=', $credentials['name'])->first();
        if ($user) {
            $staff = Staff::find($user->staff_id);
            if ($staff && $staff->use_flg == 0) {
                return response()->json(['error_message' => 'No.100006: お使いのアカウントは利用が制限されております。システム管理者へお問合せください。'], 401);
            }
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

    protected function responseUserWithToken($token, $user): array
    {
        return [
            'user' => new $user,
            'token' => $token,
        ];
    }
}
