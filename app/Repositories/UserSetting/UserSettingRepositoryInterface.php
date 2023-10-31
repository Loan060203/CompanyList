<?php

namespace App\Repositories\UserSetting;

interface UserSettingRepositoryInterface
{
    public function store(array $data, string $staff_id);
}
