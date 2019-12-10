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

/*Route::get('/', function () {
    return view('welcome');
});*/


/* Manager Route */

Route::get('/', function () {
    return view('manager.manager.dashboard');
});

Route::group(['namespace' => 'manager'], function () {
	Route::get('addskil','SkillController@addSkillView')->name('addskil');
	Route::post('addskil','SkillController@addNewskill')->name('addskil');
});


/* End Manager Route */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
