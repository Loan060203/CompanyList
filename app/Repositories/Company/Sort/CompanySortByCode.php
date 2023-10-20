<?php

namespace App\Repositories\Company\Sort;

use Illuminate\Database\Eloquent\Builder;



class CompanySortByCode implements \Spatie\QueryBuilder\Sorts\Sort
{
    public function __invoke(Builder $query,bool $descending, string $property): Builder
    {
        $direction = $descending ? 'DESC':'ASC';
        return $query->orderBy('code',$direction);

    }
}
