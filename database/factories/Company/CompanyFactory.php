<?php

namespace Database\Factories\Company;

use App\Enums\CompanyTypeEnum;
use App\Models\Company\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CompanyFactory extends Factory
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
    protected $model = Company::class;

    public function definition()
    {
        $url = $this->faker->url;
        $trimUrl = strlen($url) > 99 ? substr($url, 0, 95) . "..." : $url;
        $userIds = User::query()->get('id')->pluck('id')->toArray();
        return [
            //
            'classification' => CompanyTypeEnum::OTHER,
            'code' => $this->faker->unique()->numerify('##'),
            'name' => $this->faker->company,
            'post' => $this->faker->numerify('########'),
            'address' => $this->faker->address,
            'tel1' => $this->faker->numerify('#############'),
            'tel2' => $this->faker->numerify('#############'),
            'fax' => $this->faker->postcode,
            'contact_name' => $this->faker->name,
            'url' => $trimUrl,
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
