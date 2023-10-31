<?php

namespace App\Repositories\UserSetting;

use App\Models\Setting\UserSetting;

class UserSettingRepository implements UserSettingRepositoryInterface
{

    public function store(array $data, string $staff_id)
    {
        return UserSetting::updateOrCreate(['staff_id' => $staff_id], $data);

    }
}
