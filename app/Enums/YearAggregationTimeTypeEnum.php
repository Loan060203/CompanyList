<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

class YearAggregationTimeTypeEnum extends Enum
{
    const FULL_YEAR = 1;
    const JULY_TO_JUNE = 2;
    const MONTHS_GAP = 6;
    const CONTENT_DSP_FLG_THIS_YEAR = 1;
    const CONTENT_DSP_FLG_THIS_YEAR_AND_LAST_YEAR = 2;

}
