<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
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
Route::resource('posts',"\App\Http\Controllers\PostsController");
Route::get('/view/tests/1{id}', "App\Http\Controllers\PostsController@test");
Route::get('/databases/tests/insert', function(){
    DB::insert('insert into posts(title,body) values(?,?)', ['PHP with laravela', 'Laravell ias the best thing that has happened to PHP']);
});
Route::get('/databases/tests/select', function(){
    $result = DB::select('select * from posts');
    foreach($result as $a) {
        //return $a->title;
        echo $a->title . "<br>";
        echo $a->body . "<br>";
    }
});
Route::get('/databases/tests/update', function() {
    $updated = DB::update('update posts set title = "upsdated title"');
    return $updated;
});
Route::get('/databases/tests/delete', function(){
    return $deleted;
});
Route::get('/eloquent', function(){
    foreach(Post::all() as $n) {             
        echo $n->title . "   ///////////  " . $n->body . "<br>";
    } 
});
Route::get('/eloquent/find/{id}', function($id){
    $post = Post::find($id);
    return $post->body;
});
Route::get('eloquent/where/{id}', function($id){
    $post = Post::where('id', $id)->get();
    return $post;
});
Route::get('/login', function() {
    return view("partials/login");
});
Route::get('/register', function() {
    return view("partials/register");
});
//Route::get('/registerr/{a}/{b}/{c}', function($a,$b,$c) {
//    DB::insert('insert into users(name,email,password) values(?,?,?)', [$a, $b, $c]);
//});
// temporary login system 
/*
Route::get('/games', '\App\Http\Controllers\GamesController@index');

Route::get('/games/create', '\App\Http\Controllers\GamesController@create');

Route::get('/games/{game}', '\App\Http\Controllers\GamesController@show');

Route::post('/games', '\App\Http\Controllers\GamesController@store');

Route::post('/games/{game}/reviews', '\App\Http\Controllers\ReviewsController@store');

Route::get('/register', '\App\Http\Controllers\RegistrationController@create');
Route::post('register', '\App\Http\Controllers\RegistrationController@store');

Route::get('/login', '\App\Http\Controllers\SessionsController@create');
Route::post('/login', '\App\Http\Controllers\SessionsController@store');
Route::get('/logout', '\App\Http\Controllers\SessionsController@destroy'); */