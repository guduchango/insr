<?php
use App\Helpers\Gf;

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

Route::get('/users','UsersController@index')
    ->name('users.index');
Route::get('/users/{user_uuid}/companies','UsersController@companiesIndex')
    ->name('users.companies.index');
Route::get('/users/{user_uuid}/companies/create','UsersController@companiesCreate')
    ->name('users.companies.create');
Route::post('/users/{user_uuid}/companies','UsersController@companiesStore')
    ->name('users.companies.store');
Route::get('/users/{user_uuid}/companies/{company_uuid}/edit','UsersController@companiesEdit')
    ->name('users.companies.edit');
Route::put('/users/{user_uuid}/companies/{company_uuid}','UsersController@companiesUpdate')
    ->name('users.companies.update');
Route::delete('/users/{user_uuid}/companies/','UsersController@companiesUpdate')
    ->name('users.companies.destroy');


Route::get('admin', function () {
    return view('admin_template');
});

Route::get('hola',function(){

    echo (new Gf)->hola();

});