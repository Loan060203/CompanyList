<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Request\UserSetting\CreateOrUpdateUserSettingRequest;
use App\Repositories\UserSetting\UserSettingRepositoryInterface;
use App\Support\Trait\HandleErrorException;
use Illuminate\Support\Facades\Auth;

class UserSettingController extends Controller
{
    use HandleErrorException;

    protected UserSettingRepositoryInterface $userSettingRepository;

    public function __construct(UserSettingRepositoryInterface $userSettingRepository)
    {
        $this->userSettingRepository = $userSettingRepository;
    }

    public function store(CreateOrUpdateUserSettingRequest $request)
    {
        $data = $request->validated();

        $this->userSettingRepository->store($data, Auth::guard('sanctum')->user()->staff_id);

        return $this->httpNoContent();
    }
}
