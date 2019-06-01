<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSaveRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Role;
use App\Services\UserService;
use App\User;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function index()
    {
        return $this->service->findAll();
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function store(UserSaveRequest $request)
    {
        $user = new User();

        $user->email = $request->json('email');
        $user->password = bcrypt($request->json('password'));
        $user->full_name = $request->json('full_name');
        $user->number = $request->json('number');
        $user->role = $request->json('role');
        $user->expire = $request->json('expire');

        return $this->service->save($user);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->email = $request->json('email');
        $user->full_name = $request->json('full_name');
        $user->number = $request->json('number');
        $user->role = $request->json('role');
        $user->expire = $request->json('expire');

        if ($request->has('password')) {
            $user->password = bcrypt($request->json('password'));
        }

        return $this->service->update($user);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
