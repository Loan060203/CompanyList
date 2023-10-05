<?php
namespace App\Repositories\Company;

use App\Enums\CompanyTypeEnum;

use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Models\Company\Company;
use App\Repositories\Company\Filter\FilterByClassification;
use App\Repositories\Company\Filter\FilterByUseflg;
use App\Support\Trait\HasPagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class CompanyRepository implements CompanyRepositoryInterface
{
    use HasPagination;

    public function getAll(): array|\Illuminate\Database\Eloquent\Collection
    {
        return Company::all();
    }
    public function getAllDropdown(Request $request): array|\Illuminate\Database\Eloquent\Collection
    {
        $use_flg = $request->input('use_flg');

        if(isset($use_flg)){
            return Company::UseFlgDropdown($use_flg)->get();
        }
        return Company::all();

    }
    public function filterByParams( $params): array|\Illuminate\Database\Eloquent\Collection
    {
        $companies = Company::query();

        $filterByParams=[
            'use_flg'=> new FilterByUseflg(),
            'classification'=>new FilterByClassification(),

        ];

        foreach ($params as $param => $value) {
            $callable = $filterByParams[$param] ?? null;
            if (isset($callable)) {
                $callable($companies, $value);
            }
        }
        return $companies->get();
    }

    public function showSort(Request $request): array|\Illuminate\Database\Eloquent\Collection
    {
        $sort = $request->query('sort');

        if (str_starts_with($sort, '-')) {
            $sortColumn = substr($sort, 1);
            return Company::query()->orderByDesc($sortColumn)->get();
        }return Company::query()->orderBy($sort)->get();
    }
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
