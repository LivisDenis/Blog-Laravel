<?php

namespace App\Services;

use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthService
{
    public function register($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if ($user) {
            auth('web')->login($user);
            return $user;
        }

    }

    public function forgotPassword($data)
    {
        try {
            DB::beginTransaction();

            $user = User::where(['email' => $data['email']])->first();

            $password = uniqid();

            $user->password = bcrypt($password);
            $user->save();

            Mail::to($user)->send(new ForgotPassword($password));

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }
}
