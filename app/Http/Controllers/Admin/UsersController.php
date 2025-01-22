<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\UserRequest;
use Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $user = new User();
        return view('admin.users.form', compact('user'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        User::create([
            ...$data,
            'password' => Hash::make($data['password']),
            'role' => 'admin'
        ]);
        return redirect()->route('admin.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index');
    }
}
