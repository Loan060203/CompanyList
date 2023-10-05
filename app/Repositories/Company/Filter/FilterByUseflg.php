<?php

namespace App\Repositories\Company\Filter;

use Illuminate\Database\Eloquent\Builder;

class FilterByUseflg
{
    public function __invoke(Builder $query, int $value): Builder
    {
        return $query->where('use_flg','=',$value);
    }
}
