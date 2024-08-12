<?php

namespace App\Repositories\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

interface IAuthRepository {

    public function login(LoginRequest $request);

    public function logout(Request $request);

}
