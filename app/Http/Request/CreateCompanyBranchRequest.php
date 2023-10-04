<?php

namespace App\Http\Request;

use App\Enums\CompanyBranchTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CreateCompanyBranchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'classification' => [Rule::in(CompanyBranchTypeEnum::getValues())],
            'company_id' => 'required|numeric|exists:companies,id',
            'code' => ['max:50', 'string', 'required', Rule::unique('company_branches')],
            'name' => 'max:100|string',
            'yomigana' => 'string|nullable',
            'std_payment' => 'string|nullable',
            'tax_classify' => 'max:100|string|nullable',
            'dsp_ord_num' => 'numeric',
            'remark' => 'string|nullable',
            'idv_mgmt' => 'boolean',
            'use_flg' => 'boolean',
            'created_by'=>'max:50',
            'updated_by'=>'max:50'

            //
        ];
    }
}
