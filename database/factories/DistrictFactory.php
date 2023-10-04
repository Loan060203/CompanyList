<?php

namespace Database\Factories;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

class DistrictFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = District::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->city(),
            'use_flg' => true,
        ];
    }
}
