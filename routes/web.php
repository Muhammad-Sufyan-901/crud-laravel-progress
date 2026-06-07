<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('authors', [AuthorController::class, 'index'])->name('author.index');
Route::get('authors/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('authors', [AuthorController::class, 'store'])->name('author.store');
Route::get('authors/edit/{author}', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('authors/{author}', [AuthorController::class, 'update'])->name('author.update');
Route::delete('authors/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');

Route::get('blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('blogs/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('blogs', [BlogController::class, 'store'])->name('blog.store');
Route::get('blogs/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');