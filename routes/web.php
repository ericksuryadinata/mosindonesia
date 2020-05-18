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

Route::middleware('website.shared.variable')->group(function () {
    Route::get('/', 'Home\HomeController@index')->name('home.landing.index');
    Route::get('/tentang-kami', 'About\AboutController@index')->name('about.index');
    Route::get('/layanan', 'Service\ServiceController@index')->name('service.index');
    Route::get('/kontak-kami', 'Contact\ContactController@index')->name('contact-us.index');
    Route::post('/kontak-kami', 'Contact\ContactController@store')->name('contact-us.store');
    Route::get('/blog', 'Blog\BlogController@index')->name('blog.index');
    Route::get('/blog/{category}', 'Blog\BlogController@category')->name('blog.category');
    Route::get('/blog/{category}/{slug}','Blog\BlogController@single')->name('blog.single');
});
