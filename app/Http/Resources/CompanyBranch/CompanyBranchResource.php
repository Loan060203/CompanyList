<?php

namespace App\Http\Resources\CompanyBranch;

use App\Enums\CommonEnum;
use App\Http\Resources\Company\RelationCompanyResource;
use App\Models\Company\CompanyBranch;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Transform the resource into an array.
 *
 * @mixin   CompanyBranch
 */
class CompanyBranchResource extends JsonResource
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
            'company' => $this->whenLoaded('company', function () {
                return new RelationCompanyResource($this->company);
            }, null),
            'code' => $this->code,
            'name' => $this->name,
            'yomigana' => $this->yomigana,
            'classification' => $this->classification,
            'std_payment' => $this->std_payment,
            'tax_classify' => $this->tax_classify,
            'district_id' => $this->district_id,
            'district' => $this->whenLoaded('district'),
            'dsp_ord_num' => $this->dsp_ord_num,
            'remark' => $this->remark,
            'idv_mgmt' => $this->idv_mgmt,
            'use_flg' => $this->use_flg,
            'post' => $this->post,
            'address' => $this->address,
            'tel1' => $this->tel1,
            'tel2' => $this->tel2,
            'fax' => $this->fax,
            'contact_name' => $this->contact_name,
            'url' => $this->url,
//            'create_info' => [
//                'date' => $this->created_at->format(CommonEnum::DATE_TIME_FORMAT),
//                'name' => $this->createdUserName(),
//            ],
//            'update_info' => [
//                'date' => $this->updated_at->format(CommonEnum::DATE_TIME_FORMAT),
//                'name' => $this->updatedUserName(),
//            ]

        ];
    }
}
