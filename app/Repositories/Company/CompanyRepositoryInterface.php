<?php
namespace App\Repositories\Company;

use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use Illuminate\Http\Request;

interface CompanyRepositoryInterface
{
    public function getAll();

    public function filters();

    public function findByFilters();

    public function showSort(Request $request);

    public function getAllDropdown(Request $request);

    public function getAllWithBranches();

    public function getById($id);

    public function getByUseFlg($use_flg);

    public function create(CreateCompanyRequest $request);

    public function update(UpdateCompanyRequest $request, int $id);

    public function delete($id);

}
