<?php

namespace App\Http\Resources\District;

use App\Http\Resources\PaginationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use JsonSerializable;


/**
 * Transform the resource into an array.
 *
 * @mixin   LengthAwarePaginator
 */
class DistrictCollection extends PaginationResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */

    public $collects = DistrictResource::class;

    public function toArray($request = null)
    {
        return parent::toArray($request);
    }

}
