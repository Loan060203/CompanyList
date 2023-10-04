<?php
namespace App\Repositories\CompanyBranch;



use App\Http\Request\CreateCompanyBranchRequest;
use App\Http\Request\UpdateCompanyBranchRequest;

Interface CompanyBranchRepositoryInterface
{
    public function getAll();

    public function getAllBranches();

    public function getById($id);

    public function create(CreateCompanyBranchRequest $request);

    public function update(UpdateCompanyBranchRequest $request, int $id);

}
