<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\CompanyService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['phone' => $request->get('phone'), 'password' => $request->get('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('twin')->accessToken;
            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * Register
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $companyService = new CompanyService;
        $userService = new UserService;

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = $userService->create($input);
        $company = $companyService->signup($user, $input);

        $success['token'] =  $user->createToken('twin')->accessToken;
        $success['name'] =  $user->name;
        $success['company'] = $company;

        return response()->json(['success' => $success], 200);
    }
}
