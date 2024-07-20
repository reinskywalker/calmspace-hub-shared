<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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


Route::get('/', [UserController::class, 'home'])
    ->name('home');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/users', [ManageUserController::class, 'index'])->name('usersIndex');
    Route::get('/adminhome', [AdminController::class, 'adminhome'])->name('adminhome');
    Route::get('/approval', [ApprovalController::class, 'viewapproval'])
        ->name('approval');
});

Route::middleware(['auth', 'verified', 'role:admin|user'])->prefix('user')->group(function () {

    Route::get('/home', [UserController::class, 'home'])
        ->name('home');

    Route::get('/articles', [ArticleController::class, 'view'])
        ->name('articles');


    Route::post('/deleteUserTest/{id}', [UserController::class, 'deleteUserTest'])
        ->name('deleteUserTest');
});
