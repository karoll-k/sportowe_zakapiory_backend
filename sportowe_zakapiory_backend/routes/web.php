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
    $post = Post::all(); 
    foreach($post as $n) {             
        echo $n->title . "<br>";
    } 
});
Route::get('/eloquent/find', function(){
    $post = Post::find(3);
    return $post->title;
});