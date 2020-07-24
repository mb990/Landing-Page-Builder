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

//Awesome Icons
Route::get('/awesome-icons', 'AwesomeIconController@index')->name('awesome-icons.show');

//Templates
Route::post('/template', 'TemplateController@store')->name('template.store');
Route::get('/templates', 'TemplateController@index')->name('templates.show');
Route::get('/template/{id}', 'TemplateController@show')->name('template.show');

//Page Element Types
Route::get('/page-element-types', 'PageElementTypeController@index')->name('page-element-types.show');

//Page Elements
Route::post('/page-element', 'PageElementController@store')->name('page-element.store');

//Top Menu Links
Route::post('/link', 'TopMenuLinkController@store')->name('top-menu-link.store');

//Template Images
Route::post('/template-top-menu-image', 'Template\TopMenuImageController@store')->name('template.top-menu-image.store');
Route::post('/template-testimonial-image', 'Template\TestimonialImageController@store')->name('template.testimonial-image.store');
Route::post('/template-hero-section-image', 'Template\HeroSectionImageController@store')->name('template.hero-section-image.store');
Route::post('/template-general-content-one-section-image', 'Template\GeneralContentSectionOneImageController@store')->name('template.general-content-one-section-image.store');
Route::post('/template-general-content-two-section-image', 'Template\GeneralContentSectionTwoImageController@store')->name('template.general-content-two-section-image.store');
Route::post('/template-gallery-image-item-image', 'Template\GalleryImageItemImageController@store')->name('template.gallery-image-item-image.store');

//Top Menu Settings
Route::post('/template/top-menu-settings', 'Template\TopMenuSettingsController@store')->name('template.top-menu-settings.store');

//Testimonial Sections
Route::post('/template/testimonial-section', 'Template\TestimonialSectionController@store')->name('template.testimonial-section.store');

//Testimonials
Route::post('/template/testimonial-settings', 'Template\TestimonialSettingsController@store')->name('template.testimonial-settings.store');

//Pricing Sections
Route::post('/template/pricing-section', 'Template\PricingSectionController@store')->name('template.pricing-section.store');

//Price Settings
Route::post('/template/price-settings', 'Template\PriceSettingsController@store')->name('template.price-settings.store');

//Price Settings Benefits
Route::post('/template/benefit', 'Template\PricingSettingsBenefitController@store')->name('template.price-settings-benefit.store');

//Footer Settings
Route::post('/template/footer-settings', 'Template\FooterSettingsController@store')->name('template.footer-settings.store');

//Hero Section Settings
Route::post('/template/hero-section-settings', 'Template\HeroSectionSettingsController@store')->name('template.hero-section-settings.store');

//General Content One Settings
Route::post('/template/general-content-one-settings', 'Template\GeneralContentOneSettingsController@store')->name('template.general-content-one-settings.store');

//General Content Two Settings
Route::post('/template/general-content-two-settings', 'Template\GeneralContentTwoSettingsController@store')->name('template.general-content-two-settings.store');

//General Content Three Settings
Route::post('/template/general-content-three-settings', 'Template\GeneralContentThreeSettingsController@store')->name('template.general-content-three-settings.store');

//General Content Three Bullet Point
Route::post('/template/general-content-three-bullet-point', 'Template\GeneralContentThreeBulletPointController@store')->name('template.general-content-three-bullet-point.store');

//General Content Three Tile
Route::post('/template/general-content-three-tile', 'Template\GeneralContentThreeTileController@store')->name('template.general-content-three-tile.store');

//NewsletterSettings Section
Route::post('/template/newsletter', 'Template\NewsletterSettingsController@store')->name('template.newsletter.store');

//Gallery Settings
Route::post('/template/gallery-settings', 'Template\GallerySettingsController@store')->name('template.gallery-settings.store');

//Gallery Settings Image Item
Route::post('/template/gallery-image-item', 'Template\GalleryImageItemController@store')->name('template.gallery-image-item.store');

//Gallery Settings Video Item
Route::post('/template/gallery-video-item', 'Template\GalleryVideoItemController@store')->name('template.gallery-video-item.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'PageController@test')->name('test');

Route::get('/test-project', 'PageController@testProject');
Route::get('/test2', 'PageController@test2');
Route::get('/profile', 'PageController@profile');
Route::get('/new-project', 'PageController@newProject');
Route::get('/template-view/{id}', 'PageController@testProject2');
