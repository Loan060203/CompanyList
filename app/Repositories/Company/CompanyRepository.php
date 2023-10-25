<?php
namespace App\Repositories\Company;

use App\Enums\CompanyTypeEnum;

use App\Http\Request\CompanyDTO;
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
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;


class CompanyRepository implements CompanyRepositoryInterface
{
    use HasPagination;

    protected function allowedCustomFilters(): array
    {
        return [
            AllowedFilter::custom('use_flg' , new FilterByUseflg),
            AllowedFilter::custom('classification', new FilterByClassification),
        ];
    }

    public function getAll(): \Illuminate\Support\Collection
    {
        return QueryBuilder::for(Company::class)->get();

    }
    public function getAllDropdown(Request $request): \Illuminate\Support\Collection
    {
        $use_flg = $request->input('use_flg');

        if(isset($use_flg)){

            return QueryBuilder::for(Company::class)
                ->where('use_flg', $use_flg)
                ->get();

        }
        return Company::all();
    }

    protected array $defaultSelect = [
        'companies.id',
        'companies.classification',
        'companies.code',
        'companies.name',
        'companies.yomigana',
        'companies.post',
        'companies.address',
        'companies.tel1',
        'companies.tel2',
        'companies.fax',
        'companies.contact_name',
        'companies.url',
        'companies.dsp_ord_num',
        'companies.remark',
        'companies.idv_mgmt',
        'companies.use_flg',
        'companies.created_at',
        'companies.created_by',
        'companies.updated_at',
        'companies.updated_by'
    ];

    protected string $defaultSort = 'dsp_ord_num';
     protected array $allowedFilters =[
         'code',
         'name',
         'use_flg',
         'classification'
         ];

    protected array $allowedSorts = [
        'updated_at',
        'name',
        'code',
        'use_flg',
        'address',
        'tel1',
        'created_at',
        'dsp_ord_num',
        'yomigana'
    ];

    protected function allowedCustomSorts(): array
    {
        return [
            AllowedSort::custom('code', new CompanySortByCode, ''),
        ];
    }

    public function filters(): QueryBuilder
    {
        return QueryBuilder::for(Company::class)
            ->addSelect($this->defaultSelect)
            ->allowedFilters([
                ...$this->allowedFilters,
                ...$this->allowedCustomFilters(),
            ])
            ->allowedSorts([
            ...$this->allowedSorts,
            ...$this->allowedCustomSorts(),
        ])
            ->defaultSort($this->defaultSort);

    }

    public function findByFilters(): LengthAwarePaginator
    {
        return $this->filters()->paginate($this->getPerPage());
    }

    public function showSort(Request $request): array|\Illuminate\Database\Eloquent\Collection
    {
        return QueryBuilder::for(Company::class)
            ->allowedSorts([
                AllowedSort::custom('code', new CompanySortByCode(), 'code'),
            ])
            ->get();
    }

    public function getAllWithBranches(): LengthAwarePaginator
    {
        return Company::with('branches')->paginate($this->getPerPage());
    }

    public function getById($id)
    {
        return QueryBuilder::for(Company::class)
            ->where('id', $id)
            ->first();
    }

    public function getByUseFlg($use_flg)
    {
        return Company::findOrFail($use_flg);
    }

    /**
     * @throws UnknownProperties
     */
    public function create(CreateCompanyRequest $request): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        $companyDTO = $request-> getDataTransferObject();
        return Company::query()->create($companyDTO->toArray());
    }

    /**
     * @throws UnknownProperties
     */
    public function update(UpdateCompanyRequest $request, int $id): array|null|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
    {
        $companyDTO = $request->getDataTransferObject();
        $company = Company::query()->findOrFail($id);
        $company->update($companyDTO->toArray());
        return $company;
    }

    public function delete($id)
    {
        DB::table('companies')
            ->where('id', $id)
            ->delete();
    }
}
