<?php

namespace App\Http\Controllers;

use App\Http\Filters\UserFilters;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                //
            ]
        ]);
    }

    public function index(UserFilters $filters)
    {
        return UserResource::collection(User::filter($filters)->paginate(config('app.per_page')));
    }

    public function store(UserRequest $request)
    {
        $attributes = [
            'uname' => $request->uname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($attributes);
        return $this->created();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return $this->success($user);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $attributes = array_filter($request->only('uname', 'email', 'mobile', 'status'), 'strlen');

        if ($attributes) {
            $user->update($attributes);
        }

        return $this->message('编辑成功');
    }

    public function destroy($ids)
    {
        User::destroy(explode(',', $ids));
        return $this->message('删除成功');
    }
}
