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

Route::get('/', [App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/login', [App\Http\Controllers\LoginController::class,'index'])->name('login');

Route::post('/login', [App\Http\Controllers\LoginController::class,'connect'])->name('login');

Route::post('/logout', [App\Http\Controllers\LoginController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function(){

  Route::group(['prefix'=>'account','as'=>'account'],function(){

    Route::get('/', ['uses'=>'App\Http\Controllers\AccountController@index']);

    Route::get('/login-informations', ['as'=>'.login-informations', 'uses'=>'App\Http\Controllers\Account\LoginInformationsController@index']);

    Route::group(['prefix'=>'myposts','as'=>'.myposts'],function(){
      Route::get('/', ['uses'=>'App\Http\Controllers\Account\MyPostsController@index']);

      Route::post('/', ['uses'=>'App\Http\Controllers\Account\MyPostsController@save']);
    });

    Route::group(['prefix'=>'update','as'=>'.update'],function(){

      Route::post('email',['as'=>'.email','uses'=>'App\Http\Controllers\Account\LoginInformationsController@email']);

      Route::post('password',['as'=>'.password','uses'=>'App\Http\Controllers\Account\LoginInformationsController@password']);

    });

  });
});
Route::get('/présentation', [App\Http\Controllers\HomeController::class,'presentation'])->name('presentation');
Route::post('/présentation', [App\Http\Controllers\HomeController::class,'sendMail'])->name('presentation');

Route::post('/account/myposts/remove', [App\Http\Controllers\Account\MyPostsController::class,'remove'])->name('account.myposts.remove')->middleware('auth');

Route::get('/post',[App\Http\Controllers\PostController::class,'index'])->name('post')->middleware('auth');

Route::post('/post',[App\Http\Controllers\PostController::class,'post'])->name('post')->middleware('auth');

Route::post('/like/{post_id}',[App\Http\Controllers\LikeController::class,'like'])->name('like')->middleware('auth');

Route::post('/dislike/{post_id}',[App\Http\Controllers\LikeController::class,'dislike'])->name('dislike')->middleware('auth');

Route::post('/comment/{post_id}',[App\Http\Controllers\CommentController::class,'comment'])->name('comment')->middleware('auth');
