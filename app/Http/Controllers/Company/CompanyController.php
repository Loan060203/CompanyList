<?php

namespace App\Http\Controllers\Company;


use App\Http\Controllers\Controller;
use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Http\Resources\Company\CompanyAllInDropdown;
use App\Http\Resources\Company\CompanyCollection;
use App\Http\Resources\Company\CompanyGetAllResource;
use App\Http\Resources\Company\CompanyListResource;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company\Company;
use App\Repositories\Company\CompanyRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * @property $repository
 */
class CompanyController extends Controller
{
    protected CompanyRepositoryInterface $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;

    }
    public function index(): \Illuminate\Http\JsonResponse
    {
        $companies = $this->companyRepository->getAllWithBranches();
        $companyCollection= new CompanyCollection($companies);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            'company' => $companyCollection,

        ]);
    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $company = $this->companyRepository->getById($id);
        //$companyResource = new CompanyResource($company);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            //'company' => $companyResource,
            'company'=>$company,
        ]);
    }
    public function all(): \Illuminate\Http\JsonResponse
    {
        $companies = $this->companyRepository->getAll();
        //$companyGetAllResource = CompanyGetAllResource::collection($companies);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            //'company' => $companyGetAllResource,
            'company'=>$companies,
        ]);
    }

    public function allInDropdown(Request $request): \Illuminate\Http\JsonResponse
    {
        $companies = $this->companyRepository->getAllDropdown($request);
        $companyAllInDropdown = CompanyAllInDropdown::collection($companies);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            'company' => $companyAllInDropdown,

        ]);
    }

    public function showList(Request $request ): \Illuminate\Http\JsonResponse
    {
        $companies = $this->companyRepository->filters($request);

        $companyListResource = new CompanyCollection($companies);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            'company' => $companyListResource,
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function store(CreateCompanyRequest $request): \Illuminate\Http\JsonResponse
    {
        if($this->authorize('create', Company::class)){
        $companies = $this->companyRepository->create($request);

        $queries = DB::getQueryLog();
        return response()->json([
            'queries' => $queries,
            'data'=>$companies]);}
        else{
            return response()->json(['error']);
        }
    }

    /**
     * @throws AuthorizationException
     */
    public function update(UpdateCompanyRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        if($this->authorize('update', Company::class)){
        $company = $this->companyRepository->update($request, $id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$company]);}
        else{
            return response()->json(['error']);

        }
    }

    public function showSort(Request $request ): \Illuminate\Http\JsonResponse
    {
        $companies = $this->companyRepository->showSort($request);
        $companyListResource = CompanyListResource::collection($companies);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            'company' => $companyListResource,
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        if($this->authorize('delete', Company::class)){
            $this->companyRepository->delete($id);

            $queries = DB::getQueryLog();
            return response()->json(['queries' => $queries]);}
        else{
            return response()->json(['error'=>'bạn không có quyền thực hiện hành động này!']);

        }


    }


}
