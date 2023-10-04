<?php

namespace Database\Factories\Company;

use App\Models\Company\Company;
use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\CompanyTypeEnum;
use App\Models\Company\CompanyBranch;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;


class CompanyBranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyBranch::class;

    public function definition(): array
    {
        $companyIds = Company::query()->get('id')->pluck('id')->toArray();
        $districtIds = District::query()->get('id')->pluck('id')->toArray();

        return [
            //
            'classification' => $this->faker->numberBetween(0, 7),
            'company_id' => Arr::random($companyIds),
            'district_id' => Arr::random($districtIds),
            'code' => $this->faker->countryCode,
            'name' => $this->faker->company,
            'dsp_ord_num' => $this->faker->numberBetween(0, 99999),
            'remark' => $this->faker->text,
            'idv_mgmt' => $this->faker->boolean,
            'use_flg' => $this->faker->boolean,
            'created_by' => $this->faker->unique()->numerify('####'),
            'updated_by' => $this->faker->unique()->numerify('##'),
            'created_at' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+1 months'),
            'updated_at' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+2 months')
        ];
    }
}
