<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\Company\CompanyRepository;
use App\Repositories\Company\CompanyRepositoryInterface;
use App\Repositories\CompanyBranch\CompanyBranchRepository;
use App\Repositories\CompanyBranch\CompanyBranchRepositoryInterface;
use App\Repositories\District\DistrictRepository;
use App\Repositories\District\DistrictRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->bind(CompanyBranchRepositoryInterface::class, CompanyBranchRepository::class);
        $this->app->bind(DistrictRepositoryInterface::class, DistrictRepository::class);
        $this->app->bind(AuthRepositoryInterface::class,AuthRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
