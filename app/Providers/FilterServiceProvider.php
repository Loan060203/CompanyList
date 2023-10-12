<?php

namespace App\Providers;

use App\Repositories\Company\Filter\FilterByClassification;
use App\Repositories\Company\Filter\FilterByUseflg;
use App\Repositories\Company\Sort\CompanySortByCode;
use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('filterByParams', function () {
            return [
                'use_flg'=> new FilterByUseflg(),
                'classification'=>new FilterByClassification(),
            ];
        });
//        $this->app->bind('$sortByCode',function ()
//        {
//            return[
//                'sort'=> new CompanySortByCode(),
//            ];
//        });
    }
}
