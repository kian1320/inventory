<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['isAdmin'])->group(function () {


    //pie
    Route::get('/dashboard', [App\Http\Controllers\Admin\ChartController::class, 'index']);

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    //items
    Route::get('items', [App\Http\Controllers\Admin\ItemsController::class, 'index']);

    Route::get('add-items', [App\Http\Controllers\Admin\ItemsController::class, 'create']);

    Route::post('add-items', [App\Http\Controllers\Admin\ItemsController::class, 'store']);

    Route::get('edit-items/{items_id}', [App\Http\Controllers\Admin\ItemsController::class, 'edit']);

    Route::put('update-items/{items_id}', [App\Http\Controllers\Admin\ItemsController::class, 'update']);

    Route::get('delete-items/{items_id}', [App\Http\Controllers\Admin\ItemsController::class, 'destroy']);


    //repair
    Route::get('repairs/{repairs_id}', [App\Http\Controllers\Admin\RepairsController::class, 'index']);

    Route::get('repairs', [App\Http\Controllers\Admin\RepairsController::class, 'view']);

    Route::get('add-repairs', [App\Http\Controllers\Admin\RepairsController::class, 'create']);

    Route::post('add-repairs', [App\Http\Controllers\Admin\RepairsController::class, 'store']);

    Route::get('edit-repairs/{repairs_id}', [App\Http\Controllers\Admin\RepairsController::class, 'edit']);

    Route::put('update-repairs/{repairs_id}', [App\Http\Controllers\Admin\RepairsController::class, 'update']);

    Route::get('delete-repairs/{repairs_id}', [App\Http\Controllers\Admin\RepairsController::class, 'destroy']);

    //Route::get('repairs/{repairs_id}', [App\Http\Controllers\Admin\RepairsController::class, 'edit']);



    //users
    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('edit-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
    Route::get('delete-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'destroy']);
});

//user side
Route::prefix('user')->middleware(['auth', 'isUser'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index']);
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


    //items
    Route::get('items', [App\Http\Controllers\User\ItemsController::class, 'index']);

    Route::get('add-items', [App\Http\Controllers\User\ItemsController::class, 'create']);

    Route::post('add-items', [App\Http\Controllers\User\ItemsController::class, 'store']);

    Route::get('edit-items/{items_id}', [App\Http\Controllers\User\ItemsController::class, 'edit']);

    Route::put('update-items/{items_id}', [App\Http\Controllers\User\ItemsController::class, 'update']);

    Route::get('delete-items/{items_id}', [App\Http\Controllers\User\ItemsController::class, 'destroy']);


    //repair
    Route::get('repairs/{repairs_id}', [App\Http\Controllers\User\RepairsController::class, 'index']);

    Route::get('repairs', [App\Http\Controllers\User\RepairsController::class, 'view']);

    Route::get('add-repairs', [App\Http\Controllers\User\RepairsController::class, 'create']);

    Route::post('add-repairs', [App\Http\Controllers\User\RepairsController::class, 'store']);

    Route::get('edit-repairs/{repairs_id}', [App\Http\Controllers\User\RepairsController::class, 'edit']);

    Route::put('update-repairs/{repairs_id}', [App\Http\Controllers\User\RepairsController::class, 'update']);

    Route::get('delete-repairs/{repairs_id}', [App\Http\Controllers\User\RepairsController::class, 'destroy']);
});
