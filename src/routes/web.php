<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [FormController::class,'index']);
Route::post('/confirm', [FormController::class, 'confirm']);
Route::get('/confirm', [FormController::class, 'confirm']);
Route::post('/send', [FormController::class, 'store']);
Route::get('/admin', [AdminController::class, 'index']);
Route::delete('/delete/{id}', [AdminController::class, 'destroy']);
Route::get('/search', [AdminController::class, 'search']);
Route::get('/reset', [AdminController::class, 'reset']);
Route::get('/export', [AdminController::class, 'export']);
Route::post('/back', [ContactController::class, 'back']);