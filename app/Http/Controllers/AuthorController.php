<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('author.index', [
            'authors' => Author::all()
        ]);
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'pen_name' => ['required', 'string', 'max:255'],
        ]);

        Author::create($validated);

        return redirect()->route('author.index');
    }

    public function edit(Author $author) {
        return view('author.edit', [
            'author' => $author
        ]);
    }

    public function update(Request $request, Author $author) {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'pen_name' => ['required', 'string', 'max:255'],
        ]);

        $author->update($validated);

        return redirect()->route('author.index');
    }

    public function destroy(Author $author) {
        $author->delete();

        return redirect()->route('author.index');
    }
}
