<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

//Admin
Route::get('/admin', 'PageController@adminPanel');
Route::get('/admin/add-template', 'PageController@addTemplate');
Route::get('/admin/templates', 'PageController@templates');
Route::get('/admin/template/{slug}', 'PageController@adminShowTemplate')->name('admin.template.show');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test1', 'PageController@test1')->name('test1');


Route::get('/test2', 'PageController@test2');

//User
Route::get('/profile/{slug}', 'PageController@profile')->name('user.profile');
Route::get('/new-project/{slug}', 'PageController@newProject')->name('project.new');
Route::get('/profile/template/{slug}', 'PageController@userShowTemplate')->name('user.template.show');

//Awesome Icons
Route::get('/awesome-icons', 'AwesomeIconController@index')->name('awesome-icons.show');

//Page Element Types
Route::get('/page-element-types', 'PageElementTypeController@index')->name('page-element-types.show');

//TEMPLATE

Route::post('/template', 'TemplateController@store')->name('template.store');
Route::get('/templates', 'TemplateController@index')->name('templates.show');
Route::get('/template/{slug}', 'TemplateController@show')->name('template.show');

//Page Elements
Route::post('/page-element', 'Template\PageElementController@store')->name('template.page-element.store');

//Top Menu Links
Route::post('/link', 'Template\TopMenuLinkController@store')->name('top-menu-link.store');

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

//PROJECT

Route::post('/project/new/{templateId}', 'ProjectController@store')->name('project.store');

//Page Element
Route::post('/project/{slug}/page-element', 'Project\PageElementController@store')->name('project.page-element.store');

//Project Image
Route::post('/project-top-menu-image', 'Project\TopMenuImageController@store')->name('project.top-menu-image.store');
Route::post('/project-testimonial-image', 'Project\TestimonialImageController@store')->name('project.testimonial-image.store');
Route::post('/project-hero-section-image', 'Project\HeroSectionImageController@store')->name('project.hero-section-image.store');
Route::post('/project-general-content-one-section-image', 'Project\GeneralContentSectionOneImageController@store')->name('project.general-content-one-section-image.store');
Route::post('/project-general-content-two-section-image', 'Project\GeneralContentSectionTwoImageController@store')->name('project.general-content-two-section-image.store');
Route::post('/project-gallery-image-item-image', 'Project\GalleryImageItemImageController@store')->name('project.gallery-image-item-image.store');

//Top Menu Settings
Route::post('/project/{slug}/top-menu-settings', 'Project\TopMenuSettingsController@store')->name('project.top-menu-settings.store');

//Top Menu Link
Route::post('/project/{slug}/link', 'Template\TopMenuLinkController@store')->name('project.top-menu-link.store');

//Testimonial Section
Route::post('/project/{slug}/testimonial-section', 'Project\TestimonialSectionController@store')->name('project.testimonial-section.store');

//Testimonial
Route::post('/project/{slug}/testimonial-settings', 'Project\TestimonialSettingsController@store')->name('project.testimonial-settings.store');

//Pricing Section
Route::post('/project/{slug}/pricing-section', 'Project\PricingSectionController@store')->name('project.pricing-section.store');

//Price Settings
Route::post('/project/{slug}/price-settings', 'Project\PricingSettingsController@store')->name('project.price-settings.store');

//Price Settings Benefit
Route::post('/project/{slug}/benefit', 'Project\PricingSettingsBenefitController@store')->name('project.price-settings-benefit.store');

//Footer Settings
Route::post('/project/{slug}/footer-settings', 'Project\FooterSettingsController@store')->name('project.footer-settings.store');

//Hero Section Settings
Route::post('/project/{slug}/hero-section-settings', 'Project\HeroSectionSettingsController@store')->name('project.hero-section-settings.store');

//General Content One Settings
Route::post('/project/{slug}/general-content-one-settings', 'Project\GeneralContentSectionOneSettingsController@store')->name('project.general-content-one-settings.store');

//General Content Two Settings
Route::post('/project/{slug}/general-content-two-settings', 'Project\GeneralContentSectionTwoSettingsController@store')->name('project.general-content-two-settings.store');

//General Content Three Settings
Route::post('/project/{slug}/general-content-three-settings', 'Project\GeneralContentSectionThreeSettingsController@store')->name('project.general-content-three-settings.store');

//General Content Three Bullet Point
Route::post('/project/{slug}/general-content-three-bullet-point', 'Project\GeneralContentThreeBulletPointController@store')->name('project.general-content-three-bullet-point.store');

//General Content Three Tile
Route::post('/project/{slug}/general-content-three-tile', 'Project\GeneralContentThreeTileController@store')->name('project.general-content-three-tile.store');

//NewsletterSettings Section
Route::post('/project/{slug}/newsletter', 'Project\NewsletterSettingsController@store')->name('project.newsletter.store');

//Gallery Settings
Route::post('/project/{slug}/gallery-settings', 'Project\GallerySettingsController@store')->name('project.gallery-settings.store');

//Gallery Settings Image Item
Route::post('/project/{slug}/gallery-image-item', 'Project\GalleryImageItemController@store')->name('project.gallery-image-item.store');

//Gallery Settings Video Item
Route::post('/project/{slug}/gallery-video-item', 'Project\GalleryVideoItemController@store')->name('project.gallery-video-item.store');

//Subscriber
Route::post('/project/{slug}/subscriber', 'SubscriberController@store')->name('project.subscriber.store');
