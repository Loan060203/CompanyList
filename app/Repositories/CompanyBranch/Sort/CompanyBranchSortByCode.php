<?php

namespace App\Repositories\CompanyBranch\Sort;

use Illuminate\Database\Eloquent\Builder;



class CompanyBranchSortByCode implements \Spatie\QueryBuilder\Sorts\Sort
{
    public function __invoke(Builder $query,bool $descending, string $property): Builder
    {
        $direction = $descending ? 'DESC':'ASC';
        return $query->orderBy('code',$direction);

    }
}
