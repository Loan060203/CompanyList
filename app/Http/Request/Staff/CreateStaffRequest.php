<?php

namespace App\Http\Request\Staff;

use App\Enums\StaffTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;


class CreateStaffRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'classification' => [Rule::in(StaffTypeEnum::getValues())],
            'branch_id' => 'required|numeric|exists:company_branches,id',
            'code' => ['max:50', 'string', 'required', Rule::unique('staff')],
            'name' => 'max:100|string',
            'email' => 'email|unique:staff,email|max:255|nullable',
            'user.name' => 'string|max:255|unique:users,name',
            'user.password' => 'string|min:8',
            'yomigana' => 'string|nullable|max:100',
            'position' => 'string|nullable|max:100',
            'dsp_ord_num' => 'numeric',
            'remark' => 'string|nullable',
            'idv_mgmt' => 'boolean',
            'use_flg' => 'boolean',
            'created_by'=>'max:50',
            'updated_by'=>'max:50'
            //
        ];
    }

    /**
     * @throws UnknownProperties
     */
    public function getDataTransferObject(): StaffDTO
    {
        return new StaffDTO($this->validated());
    }

}
