<?php

namespace App\Http\Resources\Company;

use App\Http\Resources\PaginationResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use JsonSerializable;


/**
 * Transform the resource into an array.
 *
 * @mixin   LengthAwarePaginator
 */
class CompanyCollection extends PaginationResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */

    public $collects = CompanyItemResource::class;

    public function toArray($request = null)
    {
        return parent::toArray($request);
    }

}
