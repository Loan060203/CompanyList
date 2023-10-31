<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

class DayAggregationTimeTypeEnum extends Enum
{
    const FULL_DAY = 1;
    const SEVEN_AM_TO_SIX_PM = 2;
    const HOURS_GAP = 7;
}
