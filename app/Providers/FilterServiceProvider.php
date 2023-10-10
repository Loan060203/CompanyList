<?php

namespace App\Providers;

use App\Repositories\Company\Filter\FilterByClassification;
use App\Repositories\Company\Filter\FilterByUseflg;
use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('filterByUseflg', function () {
            return new FilterByUseflg();
        });

        $this->app->bind('filterByClassification', function () {
            return new FilterByClassification();
        });
    }
}
