<?php

namespace App\Http\Request\Company;

use Spatie\DataTransferObject\DataTransferObject;

class CompanyDTO extends DataTransferObject
{
//    public ?string $id;
    public string $classification;
    public string $code;
    public ?string $name;
    public ?string $yomigana;
    public ?string $post;
    public ?string $address;
    public ?string $tel1;
    public ?string $tel2;
    public ?string $fax;
    public ?string $contact_name;
    public ?string $url;
    public ?float $dsp_ord_num;
    public ?string $remark;
    public ?bool $idv_mgmt;
    public ?bool $use_flg;
    public ?string $created_by;
    public ?string $updated_by;

}
