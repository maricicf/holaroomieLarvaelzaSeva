<?php

namespace App\Services;

use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\Auth\AuthRepository;
use Illuminate\Http\Request;

class AuthService {

    protected AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository) {
        $this->authRepository = $authRepository;
    }

    public function login(LoginRequest $request) {
        return $this->authRepository->login($request);
    }

    public function logout(Request $request) {
        return $this->authRepository->logout($request);
    }

}
