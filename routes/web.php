<?php

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
use App\Image;

Route::get('/', function () {

   /* $images = Image::all();
    foreach ($images as $image){
        echo $image->image_path . '<br>';
        echo $image->description . '<br>';
        echo $image->user->user. '<br>';
        echo '<h3> comentarios</h3>';
        foreach ($image->comments as $comment){
            echo $comment->user->user .':   ' .$comment->content . '<br>';
        }
        echo 'LIKES: '. count($image->likes);
        echo '<hr>';
    }
    die();*/

    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/configuracion', 'UserController@config')->name('config');

Route::post('/user/update', 'UserController@update')->name('user.update');

Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
