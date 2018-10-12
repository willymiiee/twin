<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company as CompanyRequest;
use App\Services\CompanyService;

/**
 * @resource Company
 *
 * API for current user's company
 */
class CompanyController extends Controller
{
    protected $roles = [];
    protected $companyService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CompanyService $companyService)
    {
        $this->middleware('auth:api');
        $this->middleware(function ($request, $next) {
            $roles = auth()->user()->jobTitles[0]->roles;
            $this->roles = $roles->where('module_id', 1)->first();
            return $next($request);
        });

        $this->companyService = $companyService;
    }

    /**
     * Display the current company.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!$this->roles->detail) {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

        $item = $this->companyService->find(auth()->user()->company->id);
        return $item;
    }

    /**
     * Update the current company detail.
     *
     * @param  CompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request)
    {
        if (!$this->roles->update) {
            return response()->json(['error' => 'Unauthorized!'], 401);
        }

        $this->companyService->update($request->all(), auth()->user()->company->id);
        return response()->json([]);
    }
}
