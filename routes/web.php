<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ManageUserController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/users', [ManageUserController::class, 'index'])->name('usersIndex');

    Route::get('/adminhome', [AdminController::class, 'adminhome'])->name('adminhome');

    Route::get('/globalQuizzes', [AdminController::class, 'globalQuizzes'])->name('globalQuizzes');
});

Route::middleware(['auth', 'verified', 'role:admin|user'])->prefix('user')->group(function () {

    Route::get('/home', [userController::class, 'home'])
        ->name('home');

    Route::get('/userQuizDetails/{id}', [userController::class, 'userQuizDetails'])
        ->name('userQuizDetails');

    Route::post('/deleteUserTest/{id}', [userController::class, 'deleteUserTest'])
        ->name('deleteUserTest');
});
