<?php
namespace App\Repositories\Company;

use App\Enums\CompanyTypeEnum;

use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Models\Company\Company;
use App\Models\Company\CompanyBranch;
use App\Repositories\Company\Filter\FilterByClassification;
use App\Repositories\Company\Filter\FilterByUseflg;
use App\Repositories\Company\Sort\CompanySortByCode;
use App\Support\Trait\HasPagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;



class CompanyRepository implements CompanyRepositoryInterface
{
    use HasPagination;

    protected array $filterByParams = [];
    protected array $sortByCode = [];
    public function __construct()
    {
        $this->filterByParams = [
            'use_flg' => new FilterByUseflg,
            'classification' => new FilterByClassification,
        ];

        $this->sortByCode=[
            'code'=> new CompanySortByCode,
        ];
    }

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
    public function filters(Request $request):LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
    {
        $companies = Company::query();

        if($params = $request->input('filter'))
        {
            $companies = $this->getFilters($companies, $this->filterByParams);
        }

        if($sort = $request->query('sort'))
        {
            $companies = $this->getSort($companies, $this->sortByCode);
        }

        return $companies->paginate($this->getPerPage());
    }

    public function getFilters(Builder $query, array $filterByParams): Builder
    {
        $params = request()->input('filter');
        foreach ($params as $param => $value) {
            $callable = $filterByParams[$param] ?? null;
            if (isset($callable)) {
                $callable($query, $value);
            }
        }
        return $query;
    }

    public function getSort(Builder $query,array $sortByCode): Builder
    {
        if ($sort = request()->query('sort')) {
            $descending = str_starts_with($sort, '-');
            $sortColumn = $descending ? substr($sort, 1) : $sort;
            $callable = $sortByCode[$sortColumn] ?? null;
            if (isset($callable)) {
                $callable($query, $descending);
            }
        }
        return $query;
    }

//    public function getFilters($companies, $params)
//    {
//
//        $filterByParams = [
//            'use_flg'=> new FilterByUseflg(),
//            'classification'=>new FilterByClassification(),
//        ];
//
//        foreach ($params as $param => $value)
//        {
//            $callable = $filterByParams[$param] ?? null;
//            if (isset($callable)) {
//                $callable($companies, $value);
//            }
//        }
//        return $companies;
//    }

//    public function getSort($companies, $sort)
//    {
//        if (str_starts_with($sort, '-')) {
//            $sortColumn = substr($sort, 1);
//            $companies->orderByDesc($sortColumn);
//        } else {
//            $companies->orderBy($sort);
//        }
//        return $companies;
//    }

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

    public function delete($id)
    {
        $companies= Company::findOrFail($id);
        $companies->delete();
        Return $companies;
    }

}
