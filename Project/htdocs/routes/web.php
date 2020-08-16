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
    return view('layouts.index');
})->name('index');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('teachers', function () {
    return view('teachers');
});

//Route::get('admission_apply', 'HomeController@admission_apply');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('admission_apply', 'AdmissionApplyController@create')->name('admission_apply.create');
Route::post('admission_apply', 'AdmissionApplyController@store')->name('admission_apply.store');
Route::get('admission_apply_status', 'AdmissionApplyController@status')->name('admission_apply.status');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
