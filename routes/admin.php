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

        Route::resource('slider', 'Slider\SliderController');

        Route::resource('inbox', 'Inbox\InboxController');

        Route::resource('contact', 'Contact\ContactController');

        Route::resource('service', 'Service\ServiceController');

        Route::resource('setting', 'Setting\SettingController');

        Route::resource('social_media', 'SocialMedia\SocialMediaController');

        Route::resource('/user', 'Setting\UserController');


        Route::get('/change-password', 'Setting\ChangePasswordController@index')->name('password.index');
        Route::post('/change-password', 'Setting\ChangePasswordController@store')->name('password.store');
    });
});
