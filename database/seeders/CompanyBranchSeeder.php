<?php

namespace Database\Seeders;

use App\Models\Company\Company;
use App\Models\Company\CompanyBranch;
use Illuminate\Database\Seeder;

class CompanyBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * @return void
     */
    public function run(): void
    {
        $companyIds = Company::pluck('id')->all();

        if (!empty($companyIds)) {
            foreach ($companyIds as $companyId) {
                CompanyBranch::factory()->count(10)->create([
                    'company_id' => $companyId,
                ]);
            }
        }

        //CompanyBranch::truncate();

    }
}
