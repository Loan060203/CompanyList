<?php

use App\Http\Controllers\Company\CompanyBranchController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\DistrictController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/districts', [DistrictController::class, 'index']);
Route::get('/company_branches', [CompanyBranchController::class, 'index']);


Route::get('/company/{id}', [CompanyController::class, 'show']);
Route::get('/district/{id}', [DistrictController::class, 'show']);
Route::get('/company_branch/{id}', [CompanyBranchController::class, 'show']);

Route::get('/companies/all/list', [CompanyController::class, 'all']);
Route::get('/company_branches/all/list', [CompanyBranchController::class, 'all']);
Route::get('/districts/all/list', [DistrictController::class, 'all']);

Route::post('/companies/store', [CompanyController::class, 'store']);
Route::put('/companies/update/{id}', [CompanyController::class, 'update'])->name('companies.index');

Route::post('/company_branches/store', [CompanyBranchController::class, 'store'])->name('company_branches.index');
Route::put('/company_branches/update/{id}', [CompanyBranchController::class, 'update'])->name('company_branches.update');

Route::get('/companies/all/list/dropdown', [CompanyController::class, 'allInDropdown']);
Route::get('/companies/showlist', [CompanyController::class, 'showList']);
Route::get('/companies/showsort', [CompanyController::class, 'showSort']);
