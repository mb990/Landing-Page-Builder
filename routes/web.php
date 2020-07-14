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

//Teplate Image
Route::post('/template-image', 'TemplateImageController@store')->name('image.store');

//Top Menu Settings
Route::post('/top-menu-settings', 'TopMenuSettingsController@store')->name('top-menu-settings.store');

//Testimonial Sections
Route::post('/testimonial-section', 'TestimonialSectionController@store')->name('testimonial-section.store');

//Testimonials
Route::post('/testimonial-settings', 'TestimonialSettingsController@store')->name('testimonial-settings.store');

//Pricing Sections
Route::post('/pricing-section', 'PricingSectionController@store')->name('pricing-section.store');

//Price Settings
Route::post('/price-settings', 'PriceSettingsController@store')->name('price-settings.store');

//Price Settings Benefits
Route::post('/benefit', 'PricingSettingsBenefitController@store')->name('price-settings-benefit.store');

//Footer Settings
Route::post('/footer-settings', 'FooterSettingsController@store')->name('footer-settings.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'PageController@test')->name('test');

Route::get('/test-project', 'PageController@testProject');
Route::get('/test2', 'PageController@test2');
Route::get('/profile', 'PageController@profile');
Route::get('/template-view/{id}', 'PageController@testProject2');

//Route::get('image/{id}', 'PageController@imageTest');
