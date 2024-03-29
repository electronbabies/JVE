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
Route::get('careers', 'StaticController@careers');
Route::get('careers/view_career/{id}', 'StaticController@view_career');
Route::get('privacy', 'StaticController@privacy');
Route::get('news_entry/view/{BlogID}', 'StaticController@news_entry');
Route::get('all_news', 'StaticController@all_news');


// Not exactly static.  Might want to change name.  GalleryController is currently an AdminController, however.
Route::get('gallery', 'StaticController@gallery');

// Forms
Route::get('forms/service', 'FormsController@service');
Route::get('forms/parts', 'FormsController@parts');
Route::get('forms/sales', 'FormsController@sales');
Route::get('forms/rental', 'FormsController@rental');
Route::get('forms/contact', 'FormsController@contact');
Route::get('forms/applyjob', 'FormsController@applyjob');
Route::get('forms/success', 'FormsController@success');
Route::post('forms/store', 'FormsController@store');
Route::post('forms/submitapplication', 'FormsController@submitapplication');



/******************************************************************************************************
 *
 * ADMIN PANEL
 *
 * All routes below are for the dashboard / administrator panel.
*******************************************************************************************************/

// Admin Dashboard
Route::get('admin', 'AdminController@index');

// Admin Users
Route::get('admin/users', 'UsersController@index');
Route::get('admin/users/edit/{UserID}', 'UsersController@edit');
Route::get('admin/users/edit/{UserID}/ReturnTo/{Location}', 'UsersController@edit');
Route::post('admin/users/store', 'UsersController@store');

// Admin Vacations
Route::get('admin/vacations', 'VacationController@index');
Route::get('admin/vacations/edit/{VacationID}', 'VacationController@edit');
Route::get('admin/vacations/edit/{VacationID}/ReturnTo/{Location}', 'VacationController@edit');
Route::get('admin/vacations/holidays/', 'VacationController@holidays');
Route::get('admin/vacations/holidays/edit/{VacationID}', 'VacationController@holidays_edit');
Route::get('admin/vacations/holidays/edit/{VacationID}/ReturnTo/{location}', 'VacationController@holidays_edit');
Route::get('admin/vacations/holidays/delete/{id}', 'VacationController@holidays_delete');
Route::post('admin/vacations/store/', 'VacationController@store');

// Admin Invoices
Route::get('admin/invoices', 'InvoiceController@index');
Route::get('admin/invoices/{Status}', 'InvoiceController@index');
Route::get('admin/invoices/edit/{InvoiceID}', 'InvoiceController@edit');
Route::get('admin/invoices/edit/{InvoiceID}/ReturnTo/{Location}', 'InvoiceController@edit');
Route::get('admin/invoices/delete_item/{id}', 'InvoiceController@delete_item');
Route::get('admin/invoices/minitrac_view/{id}', 'InvoiceController@minitrac_view');
Route::post('admin/invoices/store/', 'InvoiceController@store');

// Admin Blog
Route::get('admin/blog', 'BlogController@index');
Route::get('admin/blog/edit/{id}', 'BlogController@edit');
Route::get('admin/blog/delete/{id}', 'BlogController@delete');
Route::get('admin/blog/front_page_check/{id}', 'BlogController@front_page_check');
Route::get('admin/blog/front_page_order/{id}/order_by/{order_by}', 'BlogController@front_page_order');
Route::post('admin/blog/store/', 'BlogController@store');

// Admin Gallery
Route::get('admin/gallery', 'GalleryController@index');
Route::get('admin/gallery/edit/{id}', 'GalleryController@edit');
Route::get('admin/gallery/delete/{id}', 'GalleryController@delete');
Route::post('admin/gallery/store', 'GalleryController@store');
Route::post('admin/gallery/set_permissions', 'GalleryController@set_permissions');

// Admin Documents
Route::get('admin/documents', 'DocumentController@index');
Route::get('admin/documents/edit/{id}', 'DocumentController@edit');
Route::get('admin/documents/delete/{id}', 'DocumentController@delete');
Route::get('admin/documents/document_view/{id}', 'DocumentController@document_view');
Route::post('admin/documents/store/', 'DocumentController@store');

// Admin Careers
Route::get('admin/careers', 'CareerController@index');
Route::get('admin/careers/edit/{id}', 'CareerController@edit');
Route::get('admin/careers/delete/{id}', 'CareerController@delete');
Route::post('admin/careers/store/', 'CareerController@store');

// Admin Calendar
Route::get('admin/calendar', 'CalendarController@index');
Route::get('admin/calendar/events', 'CalendarController@events');

// Admin Permissions
Route::get('admin/permissions', 'PermissionController@index');
Route::get('admin/permissions/edit/{id}', 'PermissionController@edit');
Route::post('admin/permissions/store/', 'PermissionController@store');