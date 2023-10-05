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
        $companyResource = new CompanyResource($company);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            'company' => $companyResource,
        ]);
    }
    public function all(): \Illuminate\Http\JsonResponse
    {
        $companies = $this->companyRepository->getAll();
        $companyGetAllResource = CompanyGetAllResource::collection($companies);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            'company' => $companyGetAllResource,
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

        public function showList(Request $request )
    {
        $params = $request->input('filter');

        $companies = $this->companyRepository->filterByParams($params);

        return response()->json($companies);
    }

    public function store(CreateCompanyRequest $request): \Illuminate\Http\JsonResponse
    {
        $companies = $this->companyRepository->create($request);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$companies]);
    }
    public function update(UpdateCompanyRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $company = $this->companyRepository->update($request, $id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$company]);
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

}
