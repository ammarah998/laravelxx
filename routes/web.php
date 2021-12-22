<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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




Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('/invoices','InvoicesController');
Route::resource('/sections','sectionsController');
Route::resource('/products','productsController');
Route::get('/section/{id}', 'InvoicesController@getproducts');
Route::get('/InvoicesDetails/{id}', 'InvoicesDetailsController@edit');
Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');
Route::get('/edit_invoice/{id}', 'InvoicesController@edit');
Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');
Route::get('/Status_show/{id}', 'InvoicesController@show')->name('Status_show');
Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');
Route::get('/Invoice_Paid','InvoicesController@Invoice_Paid');
Route::get('/Invoice_UnPaid','InvoicesController@Invoice_UnPaid');
Route::get('/Invoice_Partial','InvoicesController@Invoice_Partial');
Route::resource('Archive', 'InvoiceAchiveController');
Route::get('Print_invoice/{id}','InvoicesController@Print_invoice');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');});
Route::get('invoices_report', 'Invoices_Report@index');
Route::post('Search_invoices', 'Invoices_Report@Search_invoices')->name('Search');
Route::get('customers_report', 'Customers_Report@index')->name("customers_report");
Route::post('Search_customers', 'Customers_Report@Search_customers')->name('Search_customers');
Route::get('MarkAsRead_all','InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');
Route::get('unreadNotifications_count', 'InvoicesController@unreadNotifications_count')->name('unreadNotifications_count');
Route::get('unreadNotifications', 'InvoicesController@unreadNotifications')->name('unreadNotifications');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{page}', 'AdminController@index');

