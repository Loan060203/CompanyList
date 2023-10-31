<?php

namespace App\Http\Resources\Staff;


use App\Http\Resources\PaginationResource;
use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class StaffCollection extends PaginationResource
{

    /**
     * @param $staffs
     */
    public $collects = StaffItemResource::class;

    public function toArray($request = null): array|JsonSerializable|Arrayable
    {
        return parent::toArray($request);
    }

}
