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

Route::get('/','LoginRegisterController@create')->name('index');
Route::post('/login','LoginRegisterController@login');
Route::post('/register','LoginRegisterController@register');
Route::get('/logout','LoginRegisterController@logout');


//password reset routes...........................................................

Route::get('/forgot-password','ForgotPasswordController@forgotPassword');
Route::post('/forgot-password','ForgotPasswordController@sendMail');
Route::get('/recover','ForgotPasswordController@resetPassword');
Route::post('/recover','ForgotPasswordController@changePassword');

//Items and category routes........................................................
Route::get('/home','HomeController@showCategories')->name('home');

Route::post('/add_category','CategoryController@store');
Route::get('/add_category','CategoryController@showForm');

Route::post('/add_location','LocationController@store');
Route::get('/add_location','LocationController@showForm');

Route::post('/add_item/{cat}','ItemController@store');
Route::get('/add_item/{cat}','ItemController@showForm');

Route::post('/change_category','CategoryController@changeCategory');
Route::get('/change_category/{cat}/{item}','CategoryController@showChangeCategoryForm');

Route::get('/show_items/{id}','HomeController@showItems');
Route::post('/add_item','ItemController@add');

Route::get('/location/{id}','LocationController@showItems');

//update item routes..............................................................

Route::get('/update/{category}/{item}','ItemController@showUpdateForm');
Route::post('/update','ItemController@updateItems');

Route::post('/change_category','CategoryController@changeCategory');
Route::get('/change_category/{cat}/{item}','CategoryController@showChangeCategoryForm');

Route::post('/change_location','LocationController@changeLocation');
Route::get('/change_location/{loc}/{item}','LocationController@showChangeLocationForm');

//records routes....................................................................

Route::get('/records/{id}','RecordController@showRecords');

//delete routes.....................................................................

Route::post('/delete_item','DeleteController@deleteItem');
Route::post('/delete_category','DeleteController@deleteCategory');
Route::post('/delete_location','DeleteController@deleteLocation');

//Vendors routes...................................................................

Route::get('/vendors','VendorController@showVendors');
Route::get('/add_vendor','VendorController@showAddVendorForm');
Route::post('/add_vendor','VendorController@addVendor');

//Bill routes....................................................................

Route::get('/add_bill','BillController@showAddBillForm');
Route::post('/add_bill','BillController@storeBill');
Route::get('/showBills','BillController@showBills');
Route::get('/showBillImages/{id}','BillController@showBillImages');

//Trash routes.............................................................

Route::get('/showTrash','TrashController@showTrash');
Route::get('/restore/{item}','TrashController@restore');

//Add units................................................................

Route::get('/showUnits','UnitController@showUnits');
Route::get('/addUnit','UnitController@addUnitForm');
Route::post('/addUnit','UnitController@addUnit');
