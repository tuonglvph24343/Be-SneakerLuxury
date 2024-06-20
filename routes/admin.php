<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::group(['as' => 'user.', 'prefix' => 'users'], function () {
  Route::get('/', [UserController::class, 'list'])->name('list');
  Route::post('/', [UserController::class, 'create'])->name('create');
  Route::get('/{id}', [UserController::class, 'detail'])->name('detail');
  Route::patch('/{id}', [UserController::class, 'update'])->name('update');
});