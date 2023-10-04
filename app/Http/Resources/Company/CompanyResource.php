<?php

namespace App\Http\Resources\Company;

use App\Enums\CommonEnum;
use App\Http\Resources\Arrayable;
use App\Http\Resources\CompanyBranch\CompanyBranchItemResource;
use App\Http\Resources\Equipment\EquipmentItemResource;
use App\Http\Resources\Staff\StaffItemResource;
use App\Http\Resources\Vehicle\VehicleItemResource;
use App\Models\Company\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'classification' => $this->classification,
            'code' => $this->code,
            'name' => $this->name,
            'yomigana' => $this->yomigana,
            'branches' => $this->whenLoaded('branches', function () {
                return CompanyBranchItemResource::collection($this->branches);
            }, null),
//            'staffs' => $this->whenLoaded('active_staffs', function () {
//                return StaffItemResource::collection($this->active_staffs);
//            }, null),
//            'vehicles' => $this->whenLoaded('active_vehicles', function () {
//                return VehicleItemResource::collection($this->active_vehicles);
//            }, null),
//            'equipments' => $this->whenLoaded('active_equipments', function () {
//                return EquipmentItemResource::collection($this->active_equipments);
//            }, null),
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
