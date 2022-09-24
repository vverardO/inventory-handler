<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Authentication\Login;
use App\Http\Livewire\Authentication\Register;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Users\Index as UsersIndex;
use App\Http\Livewire\Users\Create as UsersCreate;
use App\Http\Livewire\Users\Edit as UsersEdit;
use App\Http\Livewire\Movimentations\Index as MovimentationsIndex;
use App\Http\Livewire\Places\Index as PlacesIndex;
use App\Http\Livewire\Products\Index as ProductsIndex;
use App\Http\Livewire\Entries\Index as EntriesIndex;
use App\Http\Livewire\Outputs\Index as OutputsIndex;

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    Route::prefix('users')->group(function () {
        Route::get('/', UsersIndex::class)->name('users.index');
        Route::get('/create', UsersCreate::class)->name('users.create');
        Route::get('/edit/{id}', UsersEdit::class)->name('users.edit');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', ProductsIndex::class)->name('products.index');
    });

    Route::prefix('movimentations')->group(function () {
        Route::get('/', MovimentationsIndex::class)->name('movimentations.index');
    });

    Route::prefix('entries')->group(function () {
        Route::get('/', EntriesIndex::class)->name('entries.index');
    });

    Route::prefix('outputs')->group(function () {
        Route::get('/', OutputsIndex::class)->name('outputs.index');
    });

    Route::prefix('places')->group(function () {
        Route::get('/', PlacesIndex::class)->name('places.index');
    });
});