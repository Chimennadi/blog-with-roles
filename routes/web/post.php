<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/admin/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/admin/post/show', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::get('/admin/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::patch('/admin/post/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('/admin/post/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
