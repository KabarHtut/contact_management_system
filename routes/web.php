<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/', [HomeController::class, 'dashboard']);

    Route::controller(ContactController::class)
    ->prefix('contacts')
    ->name('contact.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        Route::post('/search', 'searchContact')->name('search');
    });

    Route::controller(GroupController::class)
    ->prefix('groups')
    ->name('group.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        Route::get('/groupsFilter/{id}', 'show')->name('show');
    });
});


