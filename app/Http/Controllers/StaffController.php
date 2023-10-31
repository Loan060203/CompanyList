<?php

namespace App\Http\Controllers;


use App\Http\Request\Staff\CreateStaffRequest;
use App\Http\Resources\Staff\StaffCollection;
use App\Models\Staff;
use App\Repositories\Staff\StaffRepositoryInterface;
use App\Support\Trait\HandleErrorException;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    use HandleErrorException;

    protected StaffRepositoryInterface $staffRepository;

    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $staffs = $this->staffRepository->filters();
        $staffCollection= new StaffCollection($staffs);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            'company' => $staffCollection,

        ]);
    }

    public function all(): Response
    {
        $vehicles = $this->staffRepository->findAll();

        return $this->httpOk(StaffRelationResource::collection($vehicles));
    }

    public function allIndexDropdown(): Response
    {
        $companies = $this->staffRepository->findAll();

        return $this->httpOk(DropdownStaffResource::collection($companies));
    }

    public function store(CreateStaffRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();

        $staff = $this->staffRepository->create($data);
        //$staffCollection= new StaffCollection($staff);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            'staff' => $staff,

        ]);
    }

    public function show(string $id): Response
    {
        $staff = $this->staffRepository->showWithRelationship($id);

        return $this->httpOk(new StaffResource($staff));
    }

    public function update(UpdateStaffRequest $request, Staff $staff): Response
    {
        $data = $request->validated();

        $result = $this->staffRepository->updateStaff($data, $staff);

        $staff->manualUpdateTimeStamps($result->wasChanged());

        return $this->httpNoContent();
    }

    public function destroy(string $id): Response
    {
        $this->staffRepository->delete($id);

        return $this->httpNoContent();
    }
}
