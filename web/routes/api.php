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


Route::get('/top-products', 'ProductController@topShow');
Route::get('/all-products', 'ProductController@showNewProducts');
Route::get('/products/{id}', 'ProductController@selectProduct');
Route::post('/sell-product', 'ProductController@sellProduct');

Route::post('/search', 'ProductController@searchProducts');
Route::post('/search/narrow-down', 'ProductController@searchNarrowDown');

Route::post('/buy-product', 'ProductController@buyProduct');

Route::post('transition/user-transition','TransitionController@userTransition');
Route::post('transition/chat','TransitionController@tradeMessage');

Route::post('shipping-state/update','HistoryController@shippingStateUpdate');







