<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                'login',
            ]
        ]);
    }

    public function login(AuthenticateRequest $request)
    {
        $credentials = $request->only('email', 'mobile', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->success($this->respondWithToken($token));
        }

        return $this->failed('登录失败', 401);
    }

    public function logout()
    {
        $this->guard()->logout();

        return $this->message('退出登录成功');
    }

    public function refresh()
    {
        return $this->success($this->respondWithToken($this->guard()->refresh()));
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ];
    }

    public function guard()
    {
        return Auth::guard();
    }
}
