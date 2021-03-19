<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\DB;

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


// Route for custom data
Route::get('/post/{id}', [PostController::class, 'show_post']);

// Route to insert some data in posts
Route::get('/insert', function(){
    DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel', 'Laravel is good']);
});

// Route to read the raw data from posts
Route::get('/read', function(){
    // Results come in STD class objects so acess it like dynamic props
   
    $results = DB::select('select * from posts where id = ?', [1]);
    return $results;
});

// Route to update the raw data from posts
Route::get('/update', function(){
    $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);
    return $updated;
});




// Application routes for middlewares
Route::group(['middleware' => ['web']], function(){

});