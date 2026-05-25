<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    //student management
    Route::resource('student', \App\Http\Controllers\studentController::class);
    route::get('students', [\App\Http\Controllers\studentController::class, 'index'])->name('student.index');
    route::get('students/create', [\App\Http\Controllers\studentController::class, 'create'])->name('student.create');
    route::post('students', [\App\Http\Controllers\studentController::class, 'store'])->name('student.store');
    route::get('students/{id}', [\App\Http\Controllers\studentController::class, 'show'])->name('student.show');
    route::get('students/{id}/edit', [\App\Http\Controllers\studentController::class, 'edit'])->name('student.edit');
    route::put('students/{id}', [\App\Http\Controllers\studentController::class, 'update'])->name('student.update');
    route::delete('students/{id}', [\App\Http\Controllers\studentController::class, 'destroy'])->name('student.destroy');
    
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
