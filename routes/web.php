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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/agents', 'HomeController@index')->name('agents');
Route::get('/user', 'UserController@account')->name('account');

Route::get('/events', 'EventController@index')->name('events');

Route::get('/functions', '\App\OpenFaas\Controllers\FunctionController@index')->name('functions');
Route::get('/functions/new', '\App\OpenFaas\Controllers\FunctionController@createEdit')->name('new-function');
Route::post('/functions/{id?}', '\App\OpenFaas\Controllers\FunctionController@createEdit');
Route::post('/functions/new', '\App\OpenFaas\Controllers\FunctionController@createEdit');
Route::post('/functions/store', '\App\OpenFaas\Controllers\FunctionController@store');

Route::get('/agents', 'AgentController@index')->name('agents');
Route::get('/agents/new', 'AgentController@createEdit')->name('new-agent');
Route::post('/agents/store/{id?}', 'AgentController@store');
Route::post('/agents/{id}', 'AgentController@show');
Route::get('/agents/{id}/edit', 'AgentController@createEdit')->name('edit');

Route::get('/scenarios', 'ScenarioController@index')->name('scenarios');
Route::get('/scenarios/new', 'ScenarioController@createEdit');
Route::post('/scenarios/{id?}', 'ScenarioController@createEdit');
Route::post('/scenarios/new', 'ScenarioController@createEdit');
Route::post('/scenarios/store', 'ScenarioController@createEdit');

Route::get('/credentials', 'HomeController@index')->name('credentials');
Route::get('/services', 'HomeController@index')->name('services');


