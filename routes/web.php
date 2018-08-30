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

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('/pakarHarian', [
    'uses' => 'UserController@pakarHarian',
    'as' => 'pakarHarian'
])->middleware('auth');

Route::get('/pakarPeriode', [
    'uses' => 'UserController@pakarPeriode',
    'as' => 'pakarPeriode'
])->middleware('auth');

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);

Route::get('/hitungPeriode', [
    'uses' => 'PrediksiControllerPeriode@hitung',
    'as' => 'hitungPeriode'
]);

Route::get('/hitungHarian', [
    'uses' => 'PrediksiControllerHarian@hitung',
    'as' => 'hitungHarian'
]);

Route::get('/tampilDataPeriode', [
    'uses' => 'DataController@tampilDataPeriode',
    'as' => 'tampilDataPeriode'
]);

Route::get('/tampilDataHarian', [
    'uses' => 'DataController@tampilDataHarian',
    'as' => 'tampilDataHarian'
]);

Route::get('/tampilInputPeriode', function () {
    return view('inputperiode');
})->name('tampilInputPeriode');

Route::get('/tampilInputHarian', function () {
    return view('inputharian');
})->name('tampilInputHarian');


Route::post('/inputPeriode', [
    'uses' => 'DataController@postInputPeriode',
    'as' => 'inputPeriode'
]);

Route::post('/inputHarian', [
    'uses' => 'DataController@postInputHarian',
    'as' => 'inputHarian'
]);


Route::get('/admin', [
    'uses' => 'UserController@admin',
    'as' => 'admin'
])->middleware('admin');
