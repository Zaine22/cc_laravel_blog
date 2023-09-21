<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    //
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(6),
        ]);
    }

    public function destory(User $user)
    {
        $user->delete();

        return back();
    }

    public function edit(User $user)
    {

        return view('admin.users.edit', [
            'user' => $user,

        ]);
    }

    public function update(User $user)
    {
        $formData = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->email)],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')->ignore($user->username)],
        ]);

        $formData['avator'] = request('avator') ? request('avator')->store('avators') : $user->avator;

        $user->update($formData);

        return redirect('/')->with('success', 'Update  Profile, '.$formData['name']);
    }
}
