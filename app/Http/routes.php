<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Static Pages
Route::get('/', 'StaticController@index');
Route::get('service', 'StaticController@service');
Route::get('parts', 'StaticController@parts');
Route::get('sales', 'StaticController@sales');
Route::get('rentals', 'StaticController@rentals');

// Not exactly static.  Might want to change name.  GalleryController is currently an AdminController
Route::get('gallery', 'StaticController@gallery');
Route::get('gallery/view/{ImageID}', 'StaticController@gallery_view');

// Forms
Route::get('forms/service', 'FormsController@service');
Route::get('forms/parts', 'FormsController@parts');
Route::get('forms/sales', 'FormsController@sales');
Route::get('forms/rental', 'FormsController@rental');
Route::post('forms/store', 'FormsController@store');
Route::get('forms/success', 'FormsController@success');


/******************************************************************************************************
 *
 * ADMIN PANEL
 *
 * All routes below are for the dashboard / administrator panel.
*******************************************************************************************************/

// Admin Dashboard
Route::get('admin', 'AdminController@index');
Route::get('admin/clients', 'AdminController@clients');
Route::get('admin/employees', 'AdminController@employees');

// Admin Blog
Route::get('admin/blog', 'BlogController@index');
Route::get('admin/blog/edit/{id}', 'BlogController@edit');
Route::get('admin/blog/delete/{id}', 'BlogController@delete');
Route::post('admin/blog/store/', 'BlogController@store');

// Admin Gallery
Route::get('admin/gallery', 'GalleryController@index');
Route::get('admin/gallery/edit/{id}', 'GalleryController@edit');
Route::get('admin/gallery/delete/{id}', 'GalleryController@delete');
Route::post('admin/gallery/store/', 'GalleryController@store');

// Admin Calendar
Route::get('admin/calendar', 'CalendarController@index');
Route::get('admin/calendar/events', 'CalendarController@events');

