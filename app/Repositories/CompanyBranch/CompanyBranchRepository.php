<?php

namespace App\Repositories\CompanyBranch;

use App\Http\Request\CreateCompanyBranchRequest;
use App\Http\Request\UpdateCompanyBranchRequest;
use App\Models\Company\CompanyBranch;
use App\Support\Trait\HasPagination;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CompanyBranchRepository implements CompanyBranchRepositoryInterface
{
    use HasPagination;
    public function getAll(): array|\Illuminate\Database\Eloquent\Collection
    {
        return CompanyBranch::all();
    }

    public function getById($id)
    {
        return CompanyBranch::findOrFail($id);
    }

    public function getAllBranches():LengthAwarePaginator
    {
        return CompanyBranch::paginate($this->getPerPage());
    }

    public function create(CreateCompanyBranchRequest $request): \Illuminate\Database\Eloquent\Model
    {
        $data = $request->validated();
        return CompanyBranch::create($data);
    }

    public function update(UpdateCompanyBranchRequest $request, int $id)
    {
        $data = $request->validated();
        $branches = CompanyBranch::findOrFail($id);
        $branches->update($data);
        return $branches;
    }

}
