<?php
namespace App\Repositories\Staff;

use App\Models\Staff;
use Illuminate\Http\Request;

interface StaffRepositoryInterface
{
    public function filters();

    public function findByFilters();

    public function create(array $data);

    public function update(array $data, Staff $staff);


}
