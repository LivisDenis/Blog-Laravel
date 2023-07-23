<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view('admin.auth.login');
    }

    public function logout() {
        auth('admin')->logout();

        return redirect(route('home'));
    }

    public function login(Request $request) {
            $data = $request->validate([
                'email' => ['string', 'email', 'required'],
                'password' => ['required'],
            ]);

            if (auth('admin')->attempt($data)) {
//                return new UserResource($data);
                return redirect(route("admin.posts.index"));
            }

            return redirect(route('admin.login'))->withErrors(['email' => 'Пользователь не найден, либо данные введены неверно']);
        }
}
