<?php

use App\Http\Livewire\Authentication\Login;
use App\Http\Livewire\Authentication\Register;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Entries\Index as EntriesIndex;
use App\Http\Livewire\Entries\Create as EntriesCreate;
use App\Http\Livewire\Movimentations\Create as MovimentationsCreate;
use App\Http\Livewire\Movimentations\Index as MovimentationsIndex;
use App\Http\Livewire\Outputs\Index as OutputsIndex;
use App\Http\Livewire\Outputs\Create as OutputsCreate;
use App\Http\Livewire\Places\Create as PlacesCreate;
use App\Http\Livewire\Places\Edit as PlacesEdit;
use App\Http\Livewire\Places\Index as PlacesIndex;
use App\Http\Livewire\Products\Index as ProductsIndex;
use App\Http\Livewire\Products\Create as ProductsCreate;
use App\Http\Livewire\Products\Edit as ProductsEdit;
use App\Http\Livewire\Users\Create as UsersCreate;
use App\Http\Livewire\Users\Edit as UsersEdit;
use App\Http\Livewire\Users\Index as UsersIndex;
use Illuminate\Support\Facades\Route;

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
        Route::get('/create', ProductsCreate::class)->name('products.create');
        Route::get('/edit/{id}', ProductsEdit::class)->name('products.edit');
    });

    Route::prefix('movimentations')->group(function () {
        Route::get('/', MovimentationsIndex::class)->name('movimentations.index');
        Route::get('/create', MovimentationsCreate::class)->name('movimentations.create');
    });

    Route::prefix('entries')->group(function () {
        Route::get('/', EntriesIndex::class)->name('entries.index');
        Route::get('/create', EntriesCreate::class)->name('entries.create');
    });

    Route::prefix('outputs')->group(function () {
        Route::get('/', OutputsIndex::class)->name('outputs.index');
        Route::get('/create', OutputsCreate::class)->name('outputs.create');
    });

    Route::prefix('places')->group(function () {
        Route::get('/', PlacesIndex::class)->name('places.index');
        Route::get('/create', PlacesCreate::class)->name('places.create');
        Route::get('/edit/{id}', PlacesEdit::class)->name('places.edit');
    });
});
