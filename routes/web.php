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
//First parameter is route and second one will be anything function etc.
Route::get('/', function () {
    return view('welcome');
});

// Application routes
Route::group(['middleware' => ['web']], function(){

});