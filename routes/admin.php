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

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panelku', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/login', 'AuthController@index')->name('auth.login');
        Route::post('/login', 'AuthController@login')->name('auth.process-login');
        Route::get('/logout', 'AuthController@logout')->name('auth.logout');
    });

    Route::group(['middleware' => ['admin.auth', 'admin.global.variable']], function () {
        Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');

        Route::resource('category_gallery', 'Gallery\CategoryGalleryController');
        Route::resource('gallery', 'Gallery\ImageController');

        Route::resource('category_article', 'Article\CategoryArticleController');
        Route::resource('article', 'Article\ArticleController');
        Route::post('article/headline/{article}', 'Article\ArticleController@headline')->name('article.headline');

        Route::resource('banner', 'Banner\BannerController');
        Route::post('banner/activate/{banner}','Banner\BannerController@activate')->name('banner.activate');

        Route::resource('inbox', 'Inbox\InboxController');

        Route::resource('contact', 'Contact\ContactController');
        Route::post('contact/use/{contact}','Contact\ContactController@use')->name('contact.use');

        Route::resource('service', 'Service\ServiceController');
        Route::post('service/activate/{service}', 'Service\ServiceController@activate')->name('service.activate');

        Route::resource('web_setting', 'Setting\WebSettingController');

        Route::resource('social_media', 'SocialMedia\SocialMediaController');

        Route::resource('/user', 'Setting\UserController');


        Route::get('/change-password', 'Setting\ChangePasswordController@index')->name('password.index');
        Route::post('/change-password', 'Setting\ChangePasswordController@store')->name('password.store');
    });
});
