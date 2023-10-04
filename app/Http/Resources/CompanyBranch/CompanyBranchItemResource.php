<?php

namespace App\Http\Resources\CompanyBranch;

use App\Http\Resources\Arrayable;
use App\Http\Resources\Company\CompanyItemResource;
use App\Http\Resources\District\DistrictResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\JsonSerializable;
use App\Models\Company\CompanyBranch;
use Illuminate\Http\Request;


/**
 * Transform the resource into an array.
 *
 * @mixin   CompanyBranch
 */
class CompanyBranchItemResource extends JsonResource
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
            'use_flg' => $this->use_flg,
            'classification' => $this->classification,
            'district_id' => $this->district_id,
            'company_id' => $this->company_id,
            'district' => new DistrictResource($this->whenLoaded('district')),
            'company' => new CompanyItemResource($this->whenLoaded('company')),
            'dsp_ord_num' => $this->dsp_ord_num,
            'std_payment' => $this->std_payment,
            'tax_classify' => $this->tax_classify
        ];
    }
}
