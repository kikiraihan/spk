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
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Kriteria
Route::group(['prefix' => 'criteria'], function() {
    Route::get('/', 'CriteriaPreferenceController@index')->name('criteriaPreference');
    Route::get('/search', 'CriteriaPreferenceController@search')->name('criteriaPreference.search');
    Route::get('/create', 'CriteriaPreferenceController@create')->name('criteriaPreference.create');
    Route::get('/{id}', 'CriteriaPreferenceController@show')->name('criteriaPreference.show');
    Route::put('/', 'CriteriaPreferenceController@store')->name('criteriaPreference.store');
});