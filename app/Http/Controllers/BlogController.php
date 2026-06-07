<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'blogs' => Blog::with('author')->latest()->get()
        ]);
    }

    public function create()
    {
        return view('blog.create', [
            'authors' => Author::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_id'   => ['required', 'exists:authors,id'],
            'title'       => ['required', 'string', 'max:255'],
            'sysnopsis'   => ['required', 'string'],
        ]);

        Blog::create($validated);

        return redirect()->route('blog.index');
    }

    public function edit(Blog $blog) {
        return view('blog.edit', [
            'blog'    => $blog,
            'authors' => Author::all()
        ]);
    }

    public function update(Request $request, Blog $blog) {
        $validated = $request->validate([
            'author_id'   => ['required', 'exists:authors,id'],
            'title'       => ['required', 'string', 'max:255'],
            'sysnopsis'   => ['required', 'string'],
        ]);

        $blog->update($validated);

        return redirect()->route('blog.index');
    }

    public function destroy(Blog $blog) {
        $blog->delete();

        return redirect()->route('blog.index');
    }
}
