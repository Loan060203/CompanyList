<?php

namespace App\Http\Resources\Company;

use App\Http\Resources\CompanyBranch\CompanyBranchGetAllResource;
use App\Models\Company\Company;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Transform the resource into an array.
 *
 * @mixin   Company
 */
class CompanyGetAllResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
//            'use_flg' => $this->use_flg,
//            'classification' => $this->classification,
            'branches' => $this->whenLoaded('branches', function () {
                return CompanyBranchGetAllResource::collection($this->company_branches);
            }, null)
        ];
    }
}
