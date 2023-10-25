<?php


namespace App\Http\Request;

use App\Enums\CompanyTypeEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CreateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'classification' => [Rule::in(CompanyTypeEnum::getValues())],
            'code' => ['max:50', 'string', 'required', Rule::unique('companies')],
            'name' => 'max:100|string',
            'yomigana' => 'string|nullable',
            'post' => 'max:8',
            'address' => 'max:100',
            'tel1' => 'max:13',
            'tel2' => 'max:13',
            'fax' => 'max:13',
            'contact_name' => 'max:50',
            'url' => 'max:100',
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
    public function getDataTransferObject(): CompanyDTO
    {
        return new CompanyDTO($this->validated());
    }
}
