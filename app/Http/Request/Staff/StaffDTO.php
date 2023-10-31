<?php

namespace App\Http\Request\Staff;

use Spatie\DataTransferObject\DataTransferObject;

class StaffDTO extends DataTransferObject
{
    public string $classification;
    public string $branch_id;
    public string $code;
    public ?string $name;
    public ?string $password;
    public ?string $email;
    public ?string $yomigana;
    public ?string $position;
    public ?float $dsp_ord_num;
    public ?string $remark;
    public ?bool $idv_mgmt;
    public ?bool $use_flg;
    public ?string $created_by;
    public ?string $updated_by;
}
