<?php

namespace App\Services\Admin;

use App\Mail\AdminUser as AdminUserMail;
use App\Models\AdminUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $user = User::where(['email' => $data['email']])->first();

            $password = uniqid();

            $admin = AdminUser::query()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($password),
            ]);

            Mail::to($user)->send(new AdminUserMail($password));

            DB::commit();
            return $admin;
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

    }
}
