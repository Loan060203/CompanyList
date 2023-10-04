<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

final class CompanyBranchTypeEnum extends Enum
{
    const NOT_SET = 0;
    const DELIVERY_DESTINATION = 1;
    const SUPPLIER = 2;
    const SUBCONTRACTOR = 3;
    const SHIPPING_COMPANY = 4;
    const IN_HOUSE_FACTORY = 5;
    const IN_HOUSE_WAREHOUSE = 6;
    const OFFICE = 7;
    const ANALYSIS_COMPANY = 8;
}

