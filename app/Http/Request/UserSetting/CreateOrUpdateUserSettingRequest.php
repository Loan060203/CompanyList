<?php

namespace App\Http\Request\UserSetting;

use App\Enums\DayAggregationTimeTypeEnum;
use App\Enums\PaginationTypeEnum;
use App\Enums\RegistrationFactoryTypeEnum;
use App\Enums\SortOrderTypeEnum;
use App\Enums\YearAggregationTimeTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateOrUpdateUserSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'one_day_aggregation_time' => [Rule::in(DayAggregationTimeTypeEnum::getValues())],
            'one_year_aggregation_time' => [Rule::in(YearAggregationTimeTypeEnum::getValues())],
            'std_sort_order' => [Rule::in(SortOrderTypeEnum::getValues())],
            'std_registration_factory' => [Rule::in(RegistrationFactoryTypeEnum::getValues())],
            'pagination_num' => [Rule::in(PaginationTypeEnum::getValues())],
            //
        ];
    }
}
