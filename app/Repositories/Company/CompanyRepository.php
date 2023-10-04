<?php
namespace App\Repositories\Company;

use App\Enums\CompanyTypeEnum;

use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Models\Company\Company;
use App\Support\Trait\HasPagination;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class CompanyRepository implements CompanyRepositoryInterface
{
    use HasPagination;

    public function getAll(Request $request): array|\Illuminate\Database\Eloquent\Collection
    {
        return Company::all();
    }
    public function getAllDropdown(Request $request): array|\Illuminate\Database\Eloquent\Collection
    {
        $use_flg = $request->input('use_flg');
        return Company::useFlgDropdown($use_flg)->get();
    }
    public function filterByParams($params)
    {
        $companies = Company::query();

        if (isset($params['use_flg'])) {
            $companies->where('use_flg', $params['use_flg']);
        }
        if (isset($params['classification'])) {
            $companies->where('classification', $params['classification']);
        }

        if (isset($params['district_id'])) {
            $companies->where('district_id', $params['district_id']);
        }

        if (isset($params['company_id'])) {
            $companies->where('company_id', $params['company_id']);
        }

        return $companies->get();
    }

//    public function showPort($params)
//    {
//        $companies = Company::query();
//
//        if (isset($params['id'])) {
//            $companies->where('id', $params['id']);
//        }
//        if (isset($params['tel1'])) {
//            $companies->where('tel1', $params['tel1']);
//        }
//    }
    public function getAllWithBranches(): LengthAwarePaginator
    {
        return Company::with('branches')->paginate($this->getPerPage());
    }
    public function getById($id)
    {
        return Company::findOrFail($id);
    }
    public function getByUseFlg($use_flg)
    {
        return Company::findOrFail($use_flg);
    }
    public function create(CreateCompanyRequest $request): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        $data = $request->validated();
        return Company::query()->create($data);
    }
    public function update(UpdateCompanyRequest $request, int $id): array|null|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
    {
        $data = $request->validated();
        $company = Company::query()->findOrFail($id);
        $company->update($data);
        return $company;
    }
}
