<?php
namespace App\Repositories\District;



use App\Models\Company\CompanyBranch;
use App\Models\District;
use App\Support\Trait\Haspagination;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DistrictRepository implements DistrictRepositoryInterface
{
    use HasPagination;
    public function getAll()
    {
        return District::all();
    }

    public function getAllInPage():LengthAwarePaginator
    {
        return District::paginate($this->getPerPage());
    }

    public function getById($id)
    {
        return District::findOrFail($id);

    }
}
