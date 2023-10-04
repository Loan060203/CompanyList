<?php

namespace App\Http\Resources\CompanyBranch;

use App\Http\Resources\Company\RelationCompanyResource;
use App\Models\Company\CompanyBranch;
use Illuminate\Http\Request;


/**
 * Transform the resource into an array.
 *
 * @mixin   CompanyBranch
 */
class CompanyBranchGetAllResource
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
            'company_id' => $this->company_id,
//            'use_flg' => $this->use_flg,
            'code' => $this->code,
            'name' => $this->name,
            'company' => $this->whenLoaded('company', function () {
                return new RelationCompanyResource($this->company);
            }, null),
        ];
    }
}
