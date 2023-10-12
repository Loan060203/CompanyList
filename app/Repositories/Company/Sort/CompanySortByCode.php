<?php

namespace App\Repositories\Company\Sort;

use Illuminate\Database\Eloquent\Builder;



class CompanySortByCode
{
    public function __invoke(Builder $query,bool $descending, int $value): Builder
    {
        $direction = $descending ? 'DESC':'ASC';
        return $query->orderBy('code',$direction);

    }
}
