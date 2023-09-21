<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        //validation

        $formData = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'password' => ['required', 'max:255', 'min:8'],
        ]);
        $formData['avator'] = request('avator')->store('avators');
        $user = User::create($formData);

        auth()->login($user);

        return redirect('/')->with('success', 'Welcome! Dear, '.$formData['name']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Good Bye');
    }

    public function post_login()
    {
        $formData = request()->validate([
            'email' => ['required', 'max:255', 'min:3', Rule::exists('users', 'email')],
            'password' => ['required', 'max:255', 'min:8'],
        ]);
        //if user credentials correct -> redirect home
        if (auth()->attempt($formData)) {
            if (auth()->user()->is_admin) {
                return redirect('/admin/blogs');
            }

            return redirect('/')->with('success', 'Welcome Back');
        } else {
            //if user credentials wrong -> redirect back to form with error
            return redirect()->back()->withErrors(['email' => 'User Credentials Wrong']);
        }

    }

    public function blogcreate()
    {
        return view('blogs.user_create', [
            'categories' => Category::all(),
        ]);
    }

    public function blogstore()
    {
        $path = request('thumbnail')->store('thumbnails');
        $formData = request()->validate([
            'title' => ['required'],
            'intro' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = $path;
        Blog::create($formData);

        return redirect('/');
    }
}
