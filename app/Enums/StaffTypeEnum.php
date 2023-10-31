<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

class StaffTypeEnum extends Enum
{
    const NOT_SET = 0;
    const ADMIN = 1;
    const FACTORY_MANAGER = 2;
    const OPERATOR = 3;
    const DRIVER = 4;
    const OTHER_COMPANY = 5;
}
