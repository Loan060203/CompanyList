<?php

namespace App\Repositories\Staff;

use App\Models\Staff;
use App\Models\User;
use App\Repositories\Staff\Filter\FilterIsWorker;
use App\Repositories\Staff\Sorter\StaffDefaultSort;
use App\Support\Trait\Haspagination;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;


class StaffRepository implements StaffRepositoryInterface
{

    use HasPagination;

    public function model()
    {
        return Staff::class;
    }

    protected string $defaultSort = 'dsp_ord_num';

    protected array $defaultSelect = [
        'staffs.id',
        'staffs.classification',
        'staffs.branch_id',
        'staffs.email',
        'staffs.code',
        'staffs.name',
        'staffs.yomigana',
        'staffs.position',
        'staffs.dsp_ord_num',
        'staffs.remark',
        'staffs.idv_mgmt',
        'staffs.use_flg',
        'staffs.created_at',
        'staffs.created_by',
        'staffs.updated_at',
        'staffs.updated_by'
    ];

    protected array $allowedFilters = [
        'code',
        'name'
    ];


    protected function allowedExactFilters(): array
    {
        return [
            AllowedFilter::exact('branch_id'),
            AllowedFilter::exact('use_flg'),
            AllowedFilter::exact('classification'),
        ];
    }

    protected function allowedScopedFilters(): array
    {
        return [
            AllowedFilter::scope('company_id', 'belongsToCompany'),
            AllowedFilter::scope('use_flg_company_branch', 'belongsToActiveBranchAndActiveCompany'),
        ];
    }

    protected function allowedCustomFilters(): array
    {
        return [
            AllowedFilter::custom('is_worker', new FilterIsWorker()),
        ];
    }

    protected array $allowedSorts = [
        'updated_at',
        'name',
        'code',
        'use_flg',
        'classification',
        'position',
        'created_at',
        'dsp_ord_num',
        'yomigana'
    ];

    protected function allowedCustomSorts(): array
    {
        return [
            AllowedSort::custom('default', new StaffDefaultSort(), '')
        ];
    }

    protected array $allowedIncludes = [
        'branch.company',
        'company',
        'user'
    ];

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        //$this->pushCriteria(app(RequestCriteria::class));
    }

    public function filters()
    {
        return QueryBuilder::for($this->model)
            ->allowedFilters([
                ...$this->allowedFilters,
                ...$this->allowedExactFilters(),
                ...$this->allowedScopedFilters(),
                ...$this->allowedCustomFilters()
            ])
            ->allowedIncludes($this->allowedIncludes)
            ->allowedSorts([
                ...$this->allowedSorts,
                ...$this->allowedCustomSorts()
            ])
            ->defaultSort($this->defaultSort)
            ->select($this->defaultSelect);
    }

    public function findByFilters(): LengthAwarePaginator
    {
        return $this->filters()->paginate($this->getPerPage());
    }

    public function findAll()
    {
        return $this->filters()->get();
    }

    public function showWithRelationship(string $id)
    {
        return QueryBuilder::for(Staff::whereId($id))
            ->allowedIncludes($this->allowedIncludes)
            ->select($this->defaultSelect)
            ->firstOrFail();
    }

    public function create(array $data)
    {
        $staff = Staff::create($data);

        if (Arr::get($data, 'user.name') && Arr::get($data, 'user.password')) {
            $user = new User($data['user']);
            $staff->user()->save($user);
        }
        return $staff;
    }

    public function update(array $data, Staff $staff): Staff
    {
        $staff = $staff->fill($data);

        if (Arr::get($data, 'user.login_id')) {
            if (!$staff->user()->exists()) {
                $staff->user()->create($data['user']);
            } else {
                $staff->user->update($data['user']);
            }
        }
        //$staff->user->update($data['user']);
        $staff->save();

        return $staff;
    }

}
