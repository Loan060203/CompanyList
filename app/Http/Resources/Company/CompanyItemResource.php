<?php

namespace App\Http\Resources\Company;

use App\Http\Resources\CompanyBranch\CompanyBranchItemResource;
use App\Models\Company\Company;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Transform the resource into an array.
 *
 * @mixin   Company
 *
 * */
class CompanyItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
       return[
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'classification' => $this->classification,
            'address' => $this->address,
            'use_flg' => $this->use_flg,
            'tel1' => $this->tel1,
            'branches' => CompanyBranchItemResource::collection($this->whenLoaded('branches')),
            'branches_classification' => $this->branches_classification()
        ];
    }
}
