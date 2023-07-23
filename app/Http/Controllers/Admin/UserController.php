<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserFormRequest;
use App\Http\Resources\UserResource;
use App\Models\AdminUser;
use App\Models\User;
use App\Services\Admin\UserService;

class UserController extends Controller
{
    protected $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->orderBy("created_at", "DESC")->paginate(10);

//        return UserResource::collection($users);
        return view('admin.users.dashboard', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserFormRequest $request)
    {
        $data = $request->validated();

        $admin = $this->service->store($data);

//        return $admin instanceof AdminUser ? new UserResource($admin) : $admin;
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::query()->findOrFail($id);
        $user->delete();

        return redirect(route('admin.users.index'));
    }
}
