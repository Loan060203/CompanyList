<?php

namespace App\Repositories\Company\Filter;

use Illuminate\Database\Eloquent\Builder;

class FilterByClassification
{
    public function __invoke(Builder $query, int $value): Builder
    {
        return $query->where('classification','=',$value);
    }
}
