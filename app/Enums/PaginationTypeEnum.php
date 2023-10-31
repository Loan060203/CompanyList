<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

class PaginationTypeEnum extends Enum
{
    const TEN_ITEMS = 1;
    const TWENTY_ITEMS = 2;
    const THIRTY_ITEMS = 3;
    const FIFTY_ITEMS = 4;
    const HUNDRED_ITEMS = 5;
}
