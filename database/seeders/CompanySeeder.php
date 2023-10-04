<?php

namespace Database\Seeders;

use App\Enums\CompanyTypeEnum;
use App\Models\Company\Company;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $uniqueClassificationCompanies = Arr::except(CompanyTypeEnum::getValues(), [CompanyTypeEnum::OTHER]);
        $companies = [];
        foreach ($uniqueClassificationCompanies as $classification) {
            array_push($companies, [
                    'classification' => $classification,
                    'code' => $faker->unique()->numerify('##'),
                    'name' => $faker->company,
                    'post' => $faker->numerify('########'),
                    'address' => $faker->address,
                    'tel1' => $faker->numerify('#############'),
                    'tel2' => $faker->numerify('#############'),
                    'fax' => $faker->postcode,
                    'contact_name' => $faker->name,
                    'dsp_ord_num' => $faker->numberBetween(0, 99999),
                    'remark' => $faker->text,
                    'idv_mgmt' => true,
                    'use_flg' => true,
                    'created_by' => $faker->unique()->numerify('####'),
                    'updated_by' => $faker->unique()->numerify('##'),
                    'created_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 months'),
                    'updated_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 months')
                ]
            );
        }
        if (DB::table('companies')->count() == 0) {
            DB::table('companies')->insert($companies);
        }
        Company::factory()->count(25)->create();
    }
}
