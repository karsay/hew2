<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// 会員登録
Route::post('/register', 'Auth\RegisterController@register')->name('register');
// 最後のid取得
Route::get('/fetchId', 'Auth\RegisterController@fetchId')->name('fetchId');

// ログイン
Route::post('/login', 'Auth\LoginController@login')->name('login');

// ログアウト
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// ログインユーザー
Route::get('/user', fn() => Auth::user())->name('user');

// ログイン時のユーザ情報取得
Route::post('/getlogininfo','Auth\LoginController@getlogininfo');



// 出品時の画像保存
Route::post('/storeimage','ProductController@storeImage');

Route::get('/topProducts', 'ProductController@topShow');
Route::get('/allProducts', 'ProductController@showNewProducts');
Route::get('/products/{id}', 'ProductController@selectProduct');
Route::post('/sellProduct', 'ProductController@sellProduct');



