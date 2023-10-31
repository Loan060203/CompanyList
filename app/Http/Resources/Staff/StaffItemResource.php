<?php

namespace App\Http\Resources\Staff;

use App\Http\Request\Staff\StaffDTO;
use App\Http\Resources\CompanyBranch\CompanyBranchItemResource;
use App\Http\Resources\CompanyBranch\RelationBranchResource;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

/**
 * Transform the resource into an array.
 *
 * @mixin   Staff
 */
class StaffItemResource extends JsonResource
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
        $staffDTO = new StaffDTO([
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'use_flg' => $this->use_flg,
            'dsp_ord_num' => $this->dsp_ord_num,
            'branch_id' =>$this->whenLoaded('branch', function () {
                return CompanyBranchItemResource::collection($this->branches);
            }, null),
            'position' => $this->position,
            'classification' => $this->classification,
        ]);
        return $staffDTO->toArray();
    }
}
