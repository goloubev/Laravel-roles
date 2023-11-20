<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'posts'], function() {
        Route::get('/add-post', [PostController::class, 'create'])->name('posts.add-post');
        Route::post('/store-post', [PostController::class, 'store'])->name('posts.store-post');
        Route::get('/edit-post/{post}', [PostController::class, 'edit'])->name('posts.edit-post');
        Route::post('/update-post/{post}', [PostController::class, 'update'])->name('posts.update-post');
        Route::get('/delete-post/{post}', [PostController::class, 'destroy'])->name('posts.delete-post');
    });

    Route::group(['prefix' => 'roles'], function() {
        Route::get('/index', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/add-role', [RoleController::class, 'create'])->name('roles.add-role');
        Route::post('/store-role', [RoleController::class, 'store'])->name('roles.store-role');
        Route::get('/edit-role/{role}', [RoleController::class, 'edit'])->name('roles.edit-role');
        Route::post('/update-role/{role}', [RoleController::class, 'update'])->name('roles.update-role');
        Route::get('/delete-role/{role}', [RoleController::class, 'destroy'])->name('roles.delete-role');
    });
});

require __DIR__.'/auth.php';
