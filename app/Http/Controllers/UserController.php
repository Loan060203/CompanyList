<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Policies\UserPolicy;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;

class UserController extends Controller
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function destroy($id): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|array|User
    {
        $users= User::findOrFail($id);
        $users->delete();
        Return $users;

    }

    /**
     * @throws AuthorizationException
     */


}
