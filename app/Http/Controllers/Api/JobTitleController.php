<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobTitle as JobTitleRequest;
use App\Services\JobTitleService;

/**
 * @resource Job Title
 *
 * API for current company's job titles
 */
class JobTitleController extends Controller
{
    protected $roles = [];
    protected $jobTitleService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JobTitleService $jobTitleService)
    {
        $this->middleware('auth:api');
        $this->middleware(function ($request, $next) {
            $roles = auth()->user()->jobTitles[0]->roles;
            $this->roles = $roles->where('module_id', 4)->first();
            return $next($request);
        });

        $this->jobTitleService = $jobTitleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($departmentId, Request $request)
    {
        if (!$this->roles->list) {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

        $items = $this->jobTitleService->list($departmentId, $request->has('per_page') ? $request->per_page : 5);
        return $items;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  JobTitleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($departmentId, JobTitleRequest $request)
    {
        if (!$this->roles->create) {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

        $input = $request->all();
        $input['company_id'] = auth()->user()->company->id;

        $this->jobTitleService->create($input);
        return response()->json([], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($departmentId, $id)
    {
        if (!$this->roles->detail) {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

        $item = $this->jobTitleService->find($departmentId, $id);
        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  JobTitleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($departmentId, JobTitleRequest $request, $id)
    {
        if (!$this->roles->update) {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

        $this->jobTitleService->update($departmentId, $request->all(), $id);
        return response()->json([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($departmentId, $id)
    {
        if (!$this->roles->delete) {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

        $this->jobTitleService->delete($departmentId, $id);
        return response()->json([]);
    }
}
