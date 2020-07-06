<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/control-panel', 'PageController@controlPanel');

// Templates
Route::post('/template', 'TemplateController@store')->name('template.store');
Route::get('/templates', 'TemplateController@index');

//PageElementTypes
Route::get('/page-element-types', 'PageElementTypeController@index');

Auth::routes();

Route::post('/');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'PageController@test')->name('test');
