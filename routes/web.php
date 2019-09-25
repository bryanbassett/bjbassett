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

Route::view('/', 'welcome');


Route::group(['middleware' => ['auth']], function($router) {
    Route::get('generate-shorten-link', 'ShortLinkController@index');

    Route::get('addcategory', 'categories@index');
    Route::post('addcategory', 'categories@store')->name('add.category.post');
    Route::get('editcategory/{id}', 'categories@edit');
    Route::patch('editcategory/{id}', 'categories@update')->name('update.category.post');

    Route::post('generate-shorten-link', 'ShortLinkController@store')->name('generate.shorten.link.post');

    Route::get('/s/{slug}', 'ShortLinkController@shortenLink')->name('shorten.link');

});


Auth::routes([ 'register' => false ]);
Route::get('/home', 'HomeController@index')->name('home');
