<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Request\CompanyBranch\CreateCompanyBranchRequest;
use App\Http\Request\CompanyBranch\UpdateCompanyBranchRequest;
use App\Http\Resources\CompanyBranch\CompanyBranchCollection;
use App\Http\Resources\CompanyBranch\CompanyBranchItemResource;
use App\Http\Resources\CompanyBranch\CompanyBranchResource;
use App\Models\Company\CompanyBranch;
use App\Repositories\CompanyBranch\CompanyBranchRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
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
        $branches = $this->companyBranchRepository->getAllWithBranches();
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

    public function showList(): \Illuminate\Http\JsonResponse
    {
        $branches = $this->companyBranchRepository->findByFilters();

//        $CompanyBranchItemResource = new CompanyBranchItemResource($branches);

        $queries = DB::getQueryLog();
        return response()->json([
            'sql_query' => $queries,
            'company' => $branches,
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

    /**
     * @throws AuthorizationException
     */
    public function store(CreateCompanyBranchRequest $request): \Illuminate\Http\JsonResponse
    {
        if($this->authorize('create', CompanyBranch::class)){
        $branches = $this->companyBranchRepository->create($request);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);
        }
        else{
            return response()->json(['error']);
        }
    }

    /**
     * @throws AuthorizationException
     */
    public function update(UpdateCompanyBranchRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        if($this->authorize('update', CompanyBranch::class)){
            $branches = $this->companyBranchRepository->update($request, $id);

            $queries = DB::getQueryLog();
            return response()->json(['queries' => $queries,'data'=>$branches]);
        }
        else{
            return response()->json(['error']);
        }

    }

    /**
     * @throws AuthorizationException
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        if($this->authorize('delete', CompanyBranch::class)) {
            $this->companyBranchRepository->delete($id);

            $queries = DB::getQueryLog();
            return response()->json(['queries' => $queries]);}
        else {
            return response()->json(['error'=>'bạn không có quyền thực hiện hành động này!']);

        }
    }
}
