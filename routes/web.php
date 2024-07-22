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

// Visitor
Route::get('/', [ArticleController::class, 'view'])->name('home');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Admin
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/users', [ManageUserController::class, 'index'])->name('users.index');
    Route::get('/masterdata', [AdminController::class, 'masterdata'])->name('masterdata');
    Route::get('/approval', [ApprovalController::class, 'viewapproval'])->name('approval');
});

// User & Admin 
Route::middleware(['auth', 'verified', 'role:admin|user'])->prefix('user')->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('user.home');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::get('/articles', [ArticleController::class, 'index'])
        ->name('articles');
    Route::get('/articles/mypost', [ArticleController::class, 'mypost'])
        ->name('articles');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::post('/deleteUserTest/{id}', [UserController::class, 'deleteUserTest'])->name('deleteUserTest');
});
