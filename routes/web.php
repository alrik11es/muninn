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

Route::get('/functions', 'AgentController@index')->name('functions');
Route::get('/functions/new', 'AgentController@createEdit')->name('new-function');
Route::post('/functions/{id?}', 'AgentController@createEdit');
Route::post('/functions/new', 'AgentController@createEdit');
Route::post('/functions/store', 'AgentController@createEdit');

Route::get('/agents', 'AgentController@index')->name('agents');
Route::get('/agents/new', 'AgentController@createEdit')->name('new-agent');
Route::post('/agents/{id?}', 'AgentController@createEdit');
Route::post('/agents/new', 'AgentController@createEdit');
Route::post('/agents/store', 'AgentController@createEdit');

Route::get('/scenarios', 'ScenarioController@index')->name('scenarios');
Route::get('/scenarios/new', 'ScenarioController@createEdit');
Route::post('/scenarios/{id?}', 'ScenarioController@createEdit');
Route::post('/scenarios/new', 'ScenarioController@createEdit');
Route::post('/scenarios/store', 'ScenarioController@createEdit');

Route::get('/credentials', 'HomeController@index')->name('credentials');
Route::get('/services', 'HomeController@index')->name('services');


