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

//Templates
Route::post('/template', 'TemplateController@store')->name('template.store');
Route::get('/templates', 'TemplateController@index');
Route::get('/template/{id}', 'TemplateController@show')->name('template.show');

//Page Element Types
Route::get('/page-element-types', 'PageElementTypeController@index');

//Page Elements
Route::post('/page-element', 'PageElementController@store')->name('page-element.store');

//Top Menu Links
Route::post('/link', 'TopMenuLinkController@store')->name('top-menu-link.store');

//Images
Route::post('/image', 'ImageController@store')->name('image.store');

//Top Menu Settings
Route::post('/top-menu-settings', 'TopMenuSettingsController@store')->name('top-menu-settings.store');

//Testimonials
Route::post('/testimonial-settings', 'TestimonialSettingsController@store')->name('testimonial-settings.store');

//Price Settings
Route::post('/price-settings', 'PriceSettingsController@store')->name('price-settings.store');

//Price Settings Benefits
Route::post('/benefit', 'PricingSettingsBenefitController@store')->name('price-settings-benefit.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'PageController@test')->name('test');

Route::get('/test-project', 'PageController@testProject');
Route::get('/template-view/{id}', 'PageController@testProject2');
