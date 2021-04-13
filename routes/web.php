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

Route::get('/login', [App\Http\Controllers\LoginController::class,'index'])->name('login');

Route::post('/login', [App\Http\Controllers\LoginController::class,'connect'])->name('login');

Route::get('/', [App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/presentation', [App\Http\Controllers\HomeController::class,'presentation'])->name('presentation');
Route::post('/presentation', [App\Http\Controllers\HomeController::class,'sendMail'])->name('presentation');

Route::middleware(['auth'])->group(function(){

  Route::group(['prefix'=>'account','as'=>'account'],function(){

    Route::get('/', ['uses'=>'App\Http\Controllers\AccountController@index']);

    Route::get('/information_login',['as'=>'.information_login','uses'=>'App\Http\Controllers\Account\InformationLoginController@index']);

    Route::group(['prefix'=>'myposts','as'=>'.myposts'],function(){

      Route::get('/',['uses'=>'App\Http\Controllers\Account\MyPostsController@index']);

      Route::post('/',['as'=>'.save','uses'=>'App\Http\Controllers\Account\MyPostsController@save']);

      Route::post('/remove',['as'=>'.remove','uses'=>'App\Http\Controllers\Account\MyPostsController@remove']);

    });

    Route::group(['prefix'=>'update','as'=>'.update'],function(){

      Route::group(['prefix'=>'information_login','as'=>'.information_login'],function(){

        Route::post('/email',['as'=>'.email','uses'=>'App\Http\Controllers\Account\InformationLoginController@email']);

        Route::post('/password',['as'=>'.password','uses'=>'App\Http\Controllers\Account\InformationLoginController@password']);

      });
    });

  });

  Route::group(['prefix'=>'post','as'=>'post'],function(){

    Route::get('/',[App\Http\Controllers\PostController::class,'index']);

    Route::post('/',[App\Http\Controllers\PostController::class,'post']);

  });


  Route::post('/like/{post_id}',[App\Http\Controllers\LikeController::class,'like'])->name('like');

  Route::post('/dislike/{post_id}',[App\Http\Controllers\LikeController::class,'dislike'])->name('dislike');

  Route::post('/comment/{post_id}',[App\Http\Controllers\CommentController::class,'comment'])->name('comment');

});
