<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->paginate(6),
        ]);
    }

    public function create()
    {

        return view('admin.blogs.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
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

    public function destory(Blog $blog)
    {
        $blog->delete();

        return back();
    }

    public function edit(Blog $blog)
    {

        return view('admin.blogs.edit', [
            'blog' => $blog,
            'categories' => Category::all(),
        ]);
    }

    public function update(Blog $blog)
    {

        $formData = request()->validate([
            'title' => ['required'],
            'intro' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')->ignore($blog->id)],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = request('thumbnail') ? request('thumbnail')->store('thumbnails') : $blog->thumbnail;
        $blog->update($formData);

        return redirect('/');
    }
}
