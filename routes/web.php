<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/companies', 'Admin\CompanyController@companies')->name('companies');
    Route::get('/create_company', 'Admin\CompanyController@createCompany')->name('page_create_company');
    Route::post('/create_company', 'Admin\CompanyController@create')->name('create_company');
    Route::delete('/delete_company', 'Admin\CompanyController@delete')->name('delete_company');
    Route::get('/edit_company/{id}', 'Admin\CompanyController@editCompany')->name('page_edit_company');
    Route::put('/edit_company', 'Admin\CompanyController@edit')->name('edit_company');

    Route::get('/clients', 'Admin\ClientController@clients')->name('clients');
    Route::get('/create_client', 'Admin\ClientController@createClient')->name('page_create_client');
    Route::post('/create_client', 'Admin\ClientController@create')->name('create_client');
    Route::delete('/delete_client', 'Admin\ClientController@delete')->name('delete_client');
    Route::get('/edit_client/{id}', 'Admin\ClientController@editClient')->name('page_edit_client');
    Route::put('/edit_client', 'Admin\ClientController@edit')->name('edit_client');
    Route::post('/search', 'Admin\ClientController@search')->name('search');

    Route::get('/token', 'ApiController@update');
});
