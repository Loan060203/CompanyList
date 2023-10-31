<?php
namespace App\Repositories\CompanyBranch;



use App\Http\Request\CompanyBranch\CreateCompanyBranchRequest;
use App\Http\Request\CompanyBranch\UpdateCompanyBranchRequest;

Interface CompanyBranchRepositoryInterface
{
    public function getAllWithBranches();

    public function getAll();

    public function getAllBranches();

    public function getById($id);

    public function findByFilters();

    public function create(CreateCompanyBranchRequest $request);

    public function update(UpdateCompanyBranchRequest $request, int $id);

    public function delete($id);
}
