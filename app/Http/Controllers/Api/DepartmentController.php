<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Department as DepartmentRequest;
use App\Services\DepartmentService;

/**
 * @resource Department
 *
 * API for current company's department
 */
class DepartmentController extends Controller
{
    protected $roles = [];
    protected $departmentService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DepartmentService $departmentService)
    {
        $this->middleware('auth:api');
        $this->middleware(function ($request, $next) {
            $roles = auth()->user()->jobTitles[0]->roles;
            $this->roles = $roles->where('module_id', 3)->first();
            return $next($request);
        });

        $this->departmentService = $departmentService;
    }

    /**
     * Display the departments on current company.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$this->roles->list) {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

        $items = $this->departmentService->list(auth()->user()->company->id, $request->has('per_page') ? $request->per_page : 5);
        return $items;
    }

    /**
     * Store a new department for the current company.
     *
     * @param  DepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        if (!$this->roles->create) {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

        $input = $request->all();
        $input['company_id'] = auth()->user()->company->id;

        $this->departmentService->create($input);
        return response()->json([], 201);
    }

    /**
     * Display the specific department.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$this->roles->detail) {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

        $item = $this->departmentService->find($id);
        return $item;
    }

    /**
     * Update the specified department.
     *
     * @param  DepartmentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        if (!$this->roles->update) {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

        $this->departmentService->update($request->all(), $id);
        return response()->json([]);
    }

    /**
     * Remove the specified department.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->roles->delete) {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

        $this->departmentService->delete($id);
        return response()->json([]);
    }
}
