<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $service;
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function showRegisterForm() {
        return view('auth.register');
    }

    public function showLoginForm() {
        return view('auth.login');
    }

    public function logout() {
        auth('web')->logout();

        return redirect(route('home'));
    }

    public function register(RegisterRequest $request) {
        $data = $request->validated();

        $user = $this->service->register($data);

//        return new UserResource($user);
        return redirect(route('home'));
    }

    public function login(LoginRequest $request) {
        $data = $request->validated();

        if (auth('web')->attempt($data)) {
//            return new UserResource($data);
            return redirect(route("home"));
        }

        return redirect(route('login'))->withErrors(['email' => 'Пользователь не найден, либо данные введены неверно']);
    }

    public function showForgotForm() {
        return view('auth.forgot_form');
    }

    public function forgot(ForgotPasswordRequest $request) {
        $data = $request->validated();

        $this->service->forgotPassword($data);

        return redirect(route('login'));
    }
}
