<?php

namespace App\Repositories\Company\Filter;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterByUseflg implements Filter
{
    public function __invoke(Builder $query, $value, string $property): Builder
    {
        return $query->where('use_flg','=',$value);
    }
}
