<?php

namespace App\Http\Resources\Company;

use App\Http\Request\Company\CompanyDTO;
use App\Http\Resources\Arrayable;
use App\Http\Resources\CompanyBranch\CompanyBranchItemResource;
use App\Models\Company\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

/**
 * Transform the resource into an array.
 *
 * @mixin   Company
 */
class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     * @throws UnknownProperties
     */
    public function toArray($request)
    {
        $companyDTO = new CompanyDTO( [
            'id' => $this->id,
            'classification' => $this->classification,
            'code' => $this->code,
            'name' => $this->name,
            'yomigana' => $this->yomigana,
            'branches' => $this->whenLoaded('branches', function () {
                return CompanyBranchItemResource::collection($this->branches);
            }, null),
            'post' => $this->post,
            'address' => $this->address,
            'tel1' => $this->tel1,
            'tel2' => $this->tel2,
            'fax' => $this->fax,
            'contact_name' => $this->contact_name,
            'url' => $this->url,
            'dsp_ord_num' => $this->dsp_ord_num,
            'remark' => $this->remark,
            'idv_mgmt' => $this->idv_mgmt,
            'use_flg' => $this->use_flg,
        ]);
        return $companyDTO->toArray();
    }
}
