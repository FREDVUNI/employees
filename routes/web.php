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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users',App\Http\Controllers\backend\UserController::class);
Route::resource('countries',App\Http\Controllers\backend\CountryController::class);
Route::resource('states',App\Http\Controllers\backend\StateController::class);
Route::resource('departments',App\Http\Controllers\backend\DepartmentController::class);
Route::resource('cities',App\Http\Controllers\backend\CityController::class);

Route::get("{any}",function(){
    return view('employees.index');
})->where("{any}",".*");
