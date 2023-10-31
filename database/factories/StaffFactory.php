<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Staff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'classification' => $this->faker->numberBetween(1, 4),
            // 'branch_id' => $this->faker->numberBetween(1, 29),
            'code' => $this->faker->countryCode,
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'post' => $this->faker->numerify('#######'),
            'address' => $this->faker->address,
            'tel1' => $this->faker->numerify('#############'),
            'tel2' => $this->faker->numerify('#############'),
            'fax' => $this->faker->postcode,
            'dsp_ord_num' => $this->faker->numberBetween(0, 99999),
            'idv_mgmt' => $this->faker->boolean,
            'use_flg' => $this->faker->boolean,
            'created_by' => $this->faker->unique()->numerify('####'),
            'updated_by' => $this->faker->unique()->numerify('##'),
            'created_at' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+1 months'),
            'updated_at' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+2 months')
        ];
    }
}
