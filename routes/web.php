<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Authentication\Login;
use App\Http\Livewire\Authentication\Register;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Users\Index as UsersIndex;
use App\Http\Livewire\Users\Create as UsersCreate;
use App\Http\Livewire\Users\Edit as UsersEdit;

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    Route::prefix('users')->group(function () {
        Route::get('/', UsersIndex::class)->name('users.index');
        Route::get('/create', UsersCreate::class)->name('users.create');
        Route::get('/edit/{id}', UsersEdit::class)->name('users.edit');
    });
});