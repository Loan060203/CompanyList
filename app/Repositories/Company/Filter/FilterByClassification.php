<?php

namespace App\Repositories\Company\Filter;

use Illuminate\Database\Eloquent\Builder;

class FilterByClassification implements \Spatie\QueryBuilder\Filters\Filter
{
    public function __invoke(Builder $query, $value, string $property): Builder
    {
        return $query->where('classification','=',$value);
    }
}
