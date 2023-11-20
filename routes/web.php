<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::get('/add-post', [PostController::class, 'create'])->name('add-post');
    Route::post('/store-post', [PostController::class, 'store'])->name('store-post');
    Route::get('/edit-post/{post}', [PostController::class, 'edit'])->name('edit-post');
    Route::post('/update-post/{post}', [PostController::class, 'update'])->name('update-post');
    Route::get('/delete-post/{post}', [PostController::class, 'delete'])->name('delete-post');
});

require __DIR__.'/auth.php';
