<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
    return redirect('/login');
});

Route::post('checklogin', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/admin/home', function () {
    return view('admin.home');
});

Route::get('/user/home', function () {
    return view('user.home');
});

Route::get('/teacher/home', function () {
    return view('teacher.home');
});


Route::get('logout', [LoginController::class, 'logout']);