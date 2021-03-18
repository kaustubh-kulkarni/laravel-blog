<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
//Different routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return "This is about page";
});

Route::get('/contact', function () {
    return "This is contact page";
});

Route::get('/post/{id}/{name}', function ($id, $name) {
    return "This is post number ". $id ." " . $name;
});
// Array to wrap big URL to make them smaller
Route::get('/admin/posts/example', array('as' => 'admin.home', function(){
    // Helper function to acces that route
    $url = route('admin.home');
    return "This url is " . $url;
}));

Route::get('/post/{id}', [PostController:: class, 'index']);
// Resource will help us by creating special routes (CRUD)
Route::resource('post', PostController::class);

// Route for contact page
Route::get('/contact', [PostController::class, 'contact']);

// Application routes
Route::group(['middleware' => ['web']], function(){

});