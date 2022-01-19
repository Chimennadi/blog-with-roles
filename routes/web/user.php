<?php

use Illuminate\Support\Facades\Route;

Route::put("admin/users/{user}/update", [App\Http\Controllers\UserController::class, 'update'])->name("user.profile.update");

Route::delete("admin/users/{user}/destroy", [App\Http\Controllers\UserController::class, 'destroy'])->name("users.destroy");
