<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Request\CreateCompanyBranchRequest;
use App\Http\Request\UpdateCompanyBranchRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\CompanyBranch\CompanyBranchCollection;
use App\Http\Resources\CompanyBranch\CompanyBranchGetAllResource;
use App\Http\Resources\CompanyBranch\CompanyBranchItemResource;
use App\Http\Resources\CompanyBranch\CompanyBranchResource;
use App\Models\Company\CompanyBranch;
use App\Repositories\Company\CompanyRepositoryInterface;
use App\Repositories\CompanyBranch\CompanyBranchRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CompanyBranchController extends Controller
{
    protected CompanyBranchRepositoryInterface $companyBranchRepository;

    public function __construct(CompanyBranchRepositoryInterface $companyBranchRepository)
    {
        $this->companyBranchRepository = $companyBranchRepository;
    }
    public function index(): \Illuminate\Http\JsonResponse
    {
        $branches = $this->companyBranchRepository->getAllBranches();
        $companyBranchCollection= new CompanyBranchCollection($branches);

        $queries = DB::getQueryLog();
        return response()->json([
            'sql_query' => $queries,
            'branch' => $companyBranchCollection,
        ]);

    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $branches = $this->companyBranchRepository->getById($id);
        $CompanyBranchItemResource= new CompanyBranchItemResource($branches);

        $queries = DB::getQueryLog();
        return response()->json([
            'sql_query' => $queries,
            'branch' => $CompanyBranchItemResource,
        ]);
    }

    public  function  all(): \Illuminate\Http\JsonResponse
    {
        $branches = $this->companyBranchRepository->getAll();
        $CompanyBranchResource= CompanyBranchResource:: collection ($branches);

        $queries = DB::getQueryLog();
        return response()->json([
            'sql_query' => $queries,
            'branch' => $CompanyBranchResource,
        ]);
    }

    public function store(CreateCompanyBranchRequest $request): \Illuminate\Http\JsonResponse
    {
        $branches = $this->companyBranchRepository->create($request);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);
    }

    public function update(UpdateCompanyBranchRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $branches = $this->companyBranchRepository->update($request, $id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);
    }

}
