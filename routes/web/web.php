<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'index'])->name('post');

Route::middleware("auth")->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
});

Route::middleware("role:admin", "auth")->group(function () {
    Route::get("admin/users", [App\Http\Controllers\UserController::class, 'index'])->name("users.index"); //security

    Route::put("admin/users/{user}/attach", [App\Http\Controllers\UserController::class, 'attach'])->name("user.role.attach"); //attach
    Route::put("admin/users/{user}/detach", [App\Http\Controllers\UserController::class, 'detach'])->name("user.role.detach"); //detach
});

//My admin Id is 21
Route::middleware(["can:view,user"])->group(function () {
    Route::get("admin/users/{user}/profile/show", [App\Http\Controllers\UserController::class, 'show'])->name("user.profile.show");  //authorize user and admin
});
