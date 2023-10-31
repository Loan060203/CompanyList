<?php

namespace App\Repositories\CompanyBranch;

use App\Http\Request\CompanyBranch\CreateCompanyBranchRequest;
use App\Http\Request\CompanyBranch\UpdateCompanyBranchRequest;
use App\Models\Company\CompanyBranch;
use App\Repositories\CompanyBranch\Filter\FilterByUseflg;
use App\Repositories\CompanyBranch\Sort\CompanyBranchSortByCode;
use App\Support\Trait\HasPagination;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class CompanyBranchRepository implements CompanyBranchRepositoryInterface
{
    use HasPagination;

    public function getAllWithBranches(): LengthAwarePaginator
    {
        return CompanyBranch::with('district')->paginate($this->getPerPage());
    }
    public function getAll(): array|\Illuminate\Database\Eloquent\Collection
    {
        return CompanyBranch::all();
    }

    public function getById($id)
    {
        return CompanyBranch::findOrFail($id);
    }

    protected string $defaultSort = 'dsp_ord_num';

    protected array $defaultSelect = [
        'company_branches.id',
        'company_branches.classification',
        'company_branches.company_id',
        'company_branches.district_id',
        'company_branches.yomigana',
        'company_branches.code',
        'company_branches.name',
        'company_branches.std_payment',
        'company_branches.tax_classify',
        'company_branches.idv_mgmt',
        'company_branches.dsp_ord_num',
//        'company_branches.post',
//        'company_branches.address',
//        'company_branches.tel1',
//        'company_branches.tel2',
//        'company_branches.fax',
//        'company_branches.contact_name',
//        'company_branches.url',
        'company_branches.use_flg',
//        'company_branches.remark',
//        'company_branches.created_at',
//        'company_branches.created_by',
//        'company_branches.updated_at',
//        'company_branches.updated_by'
    ];

    protected array $allowedFilters = [
        'name',
//        'company_id',
       'code',
    ];

    protected function allowedCustomFilters(): array
    {
        return [
            AllowedFilter::custom('use_flg' , new FilterByUseflg),
            //AllowedFilter::custom('classification', new FilterByClassification),
        ];
    }

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
            AllowedSort::custom('code', new CompanyBranchSortByCode, ''),
        ];
    }
    public function filters(): QueryBuilder
    {
        return QueryBuilder::for(CompanyBranch::class)
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
    public function getAllBranches():LengthAwarePaginator
    {
        return CompanyBranch::paginate($this->getPerPage());
    }

    /**
     * @throws UnknownProperties
     */
    public function create(CreateCompanyBranchRequest $request): \Illuminate\Database\Eloquent\Model
    {
//        $data = $request->validated();
        $companyBranchDTO=$request->getDataTransferObject();
        return CompanyBranch::create($companyBranchDTO->toArray());
    }

    /**
     * @throws UnknownProperties
     */
    public function update(UpdateCompanyBranchRequest $request, int $id)
    {
//        $data = $request->validated();
        $companyBranchDTO=$request->getDataTransferObject();
        $branches = CompanyBranch::findOrFail($id);
        $branches->update($companyBranchDTO->toArray());
        return $branches;
    }

    public function delete($id)
    {
        QueryBuilder::for(CompanyBranch::class)
            ->where('id', $id)
            ->delete();
    }
}
