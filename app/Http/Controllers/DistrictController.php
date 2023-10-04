<?php

namespace App\Http\Controllers;

use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\District\DistrictCollection;
use App\Http\Resources\District\DistrictResource;
use App\Repositories\CompanyBranch\CompanyBranchRepositoryInterface;
use App\Repositories\District\DistrictRepositoryInterface;
use App\Support\Trait\HandleErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DistrictController extends Controller
{
    use HandleErrorException;

    protected DistrictRepositoryInterface $districtRepository;

    public function __construct(DistrictRepositoryInterface $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }
    //
    public function index(): \Illuminate\Http\JsonResponse
    {
        $districts= $this->districtRepository->getAllInPage();
        $districtResource= new DistrictCollection($districts);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$districtResource]);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $districts = $this->districtRepository->getById($id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$districts]);
    }

    public function all(): \Illuminate\Http\JsonResponse
    {
        $districts = $this->districtRepository->getall();

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$districts]);
    }

}
