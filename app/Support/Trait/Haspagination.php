<?php

namespace App\Support\Trait;

trait Haspagination
{
    public function getPerPage(): int
    {
        $perPage = (int)request()->get('perPage');
        return $perPage >= 1 && $perPage <= 100 ? $perPage : 20;
    }

    public function getPage(): int
    {
        $page = (int)request()->get('page');
        return $page > 0 ? $page : 1;
    }
}
