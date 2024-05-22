<?php

use Illuminate\Support\Facades\Route;

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
});


Route::post('login/esprimo', [\App\Http\Controllers\AuthController::class, 'login'])->name('login-user');


Auth::routes();

Route::group(['middleware' => ['web', 'auth',"token.auth"]], function(){
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
