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

Route::get('/', 'WelcomeController@index')->name('view.resume');
Route::get('/pdf', 'WelcomeController@makePDF')->name('make.pdf');

Route::group(['middleware' => ['auth']], function($router) {
    Route::get('generate-shorten-link', 'ShortLinkController@index');

    Route::get('addcategory', 'CategoriesController@index');
    Route::post('addcategory', 'CategoriesController@store')->name('add.category.post');
    Route::get('editcategory/{cat}', 'CategoriesController@edit');
    Route::patch('editcategory/{cat}', 'CategoriesController@update')->name('update.category.post');

    Route::get('addfield', 'FieldController@index');
    Route::post('addfield', 'FieldController@store')->name('add.field.post');

    Route::post('generate-shorten-link', 'ShortLinkController@store')->name('generate.shorten.link.post');

    Route::get('additem', 'ItemsController@index');
    Route::post('additem', 'ItemsController@store')->name('add.item.post');
    Route::get('field/get_by_category', 'FieldController@get_by_category')->name('field.get_by_category');
    Route::get('edititem/{item}', 'ItemsController@edit');
    Route::get('/popEditItem/{item}',[
        'as' => 'popEditItem', 'uses' => 'ItemsController@popEdit'
    ]);
    Route::patch('edititem/{item}', 'ItemsController@update')->name('update.item.post');
    Route::put('edititem/{item}', 'ItemsController@update')->name('update.item.post');
    Route::post('edititem/{item}', 'ItemsController@update')->name('update.item.post');

    //changing settings
    Route::get('setting/change', 'SettingsController@toggle_setting')->name('settings.toggle_setting');

});

Auth::routes([ 'register' => false ]);
Route::get('/s/{shortLink}', 'ShortLinkController@shortenLink')->name('shorten.link');




Route::get('/home', 'HomeController@index')->name('home');
