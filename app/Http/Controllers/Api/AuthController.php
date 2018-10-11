<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login as LoginRequest;
use App\Http\Requests\Auth\Register as RegisterRequest;
use App\Models\User;
use App\Services\CompanyService;
use App\Services\UserService;
use App\Services\UserActivationService;
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
        if (Auth::attempt([
            'phone' => $request->phone,
            'password' => $request->password,
            'status' => User::STATUS_ACTIVE
            ])) {
            $user = Auth::user();
            $result['token'] = $user->createToken('twin')->accessToken;
            return response()->json(['result' => $result], 200);
        } else {
            return response()->json(['error' => 'Unauthorized!'], 401);
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
        $userActivationService = new UserActivationService;

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = $userService->create($input);
        $userActivation = $userActivationService->create($user->id);
        $company = $companyService->signup($user, $input);

        $result['token'] =  $user->createToken('twin')->accessToken;
        $result['name'] =  $user->name;
        $result['company'] = $company;
        $result['activation_token'] = $userActivation->token;

        return response()->json(['result' => $result], 200);
    }

    /**
     * Activate User
     *
     * @return \Illuminate\Http\Response
     */
    public function activate($token = '')
    {
        $userService = new UserService;
        $userActivationService = new UserActivationService;
        $activation = $userActivationService->find($token);

        if ($activation) {
            $userService->update($activation->user_id, ['status' => User::STATUS_ACTIVE]);
            return response()->json(['message' => 'User activated!']);
        }

        return response()->json(['error' => 'User not found!'], 400);
    }
}
