<?php

namespace App\Repositories\Company\Sort;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;


class CompanySortByCode implements Sort
{
    public function __invoke(Builder $query,bool $descending, int $value): Builder
    {
        return $query->where('code','=',$value);

    }
}
