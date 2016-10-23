<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Models\Company;

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Auth::routes();

Route::get('/users','UsersController@index')->name('users.index');
Route::get('/users/{user_id}/companies','UsersController@companiesIndex')->name('users.companies.index');
Route::get('/users/{user_id}/companies/create','UsersController@companiesCreate')->name('users.companies.create');
Route::post('/users/{user_id}/companies','UsersController@companiesStore')->name('users.companies.store');
Route::get('/users/{user_id}/companies/{company_id}/edit','UsersController@caompaniesEdit')
    ->name('users.companies.edit');
Route::put('/users/{user_id}/companies/{company_id}','UsersController@companiesUpdate')->name('users.companies.update');
Route::delete('/users/{user_id}/companies/','UsersController@companiesUpdate')->name('users.companies.destroy');


Route::get('admin', function () {
    return view('admin_template');
});

Route::get('hola',function(){

    dd(Company::all());

});