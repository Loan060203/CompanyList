<?php

namespace App\Http\Request;

use App\Enums\CompanyTypeEnum;
use App\Rules\Company\CompanyClassificationUnique;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
        'id' => $this->route('companies') ? $this->route('companies')['id'] : null,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $companyId = $this->route('companies') ? $this->route('companies')['id'] : null;
        return [
            'classification' => [Rule::in(CompanyTypeEnum::getValues()), new CompanyClassificationUnique],
            'code' => ['max:50', 'string', 'required', Rule::unique('companies')->ignore($companyId, 'id')],
            'name' => 'max:100|string',
            'yomigana' => 'string|nullable',
            'post' => 'max:8',
            'address' => 'max:100',
            'tel1' => 'max:13',
            'tel2' => 'max:13',
            'fax' => 'max:13',
            'contact_name' => 'max:50',
            'url' => 'max:100',
            'remark' => 'string|nullable',
            'dsp_ord_num' => 'numeric',
            'idv_mgmt' => 'boolean',
            'use_flg' => 'boolean'
            //
        ];
    }
}
