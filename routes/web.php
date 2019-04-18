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
    // Route::get('/search', 'CriteriaPreferenceController@search')->name('criteriaPreference.search');
    Route::get('/create', 'CriteriaPreferenceController@create')->name('criteriaPreference.create');
    // Route::get('/{id}', 'CriteriaPreferenceController@show')->name('criteriaPreference.show');
    Route::put('/', 'CriteriaPreferenceController@store')->name('criteriaPreference.store');
    Route::delete('/delete/{id}', 'CriteriaPreferenceController@destroy')->name('criteriaPreference.destroy');

    Route::get('/penilaian-manual/create/{id}', 'PenilaianAlternatifController@createByAdmin')->name('penilaianAlternatif.createByAdmin');
    Route::put('/penilaian-manual/', 'PenilaianAlternatifController@storeByAdmin')->name('penilaianAlternatif.storeByAdmin');
});

//Penilaian
Route::group(['prefix' => 'penilaian'], function() {
    Route::get('/', 'PenilaianAlternatifController@index')->name('penilaianAlternatif');
    Route::get('/show/{id}', 'PenilaianAlternatifController@show')->name('penilaianAlternatif.show');
    Route::get('/create/{id}', 'PenilaianAlternatifController@create')->name('penilaianAlternatif.create');
    // Route::get('/{id}', 'PenilaianAlternatifController@show')->name('penilaianAlternatif.show');
    Route::put('/', 'PenilaianAlternatifController@store')->name('penilaianAlternatif.store');
    Route::delete('/delete/{id}', 'PenilaianAlternatifController@destroy')->name('penilaianAlternatif.destroy');
});


//Mahasiswa
Route::group(['prefix' => 'mahasiswa'], function() {
    Route::get('/', 'MahasiswaController@index')->name('mahasiswa');
    // Route::get('/search', 'MahasiswaController@search')->name('mahasiswa.search');
    Route::get('/create', 'MahasiswaController@create')->name('mahasiswa.create');
    // Route::get('/{id}', 'MahasiswaController@show')->name('mahasiswa.show');
    Route::put('/', 'MahasiswaController@store')->name('mahasiswa.store');
    Route::delete('/delete/{id}', 'MahasiswaController@destroy')->name('mahasiswa.destroy');
});

//User
Route::group(['prefix' => 'user'], function() {
    Route::get('/', 'UserController@index')->name('user');
    // Route::get('/search', 'UserController@search')->name('user.search');
    Route::get('/create', 'UserController@create')->name('user.create');
    // Route::get('/{id}', 'UserController@show')->name('user.show');
    Route::put('/', 'UserController@store')->name('user.store');
    Route::delete('/delete/{id}', 'UserController@destroy')->name('user.destroy');
});

//Decission
Route::group(['prefix' => 'decission'], function() {
    Route::get('/', 'DecissionController@index')->name('decission');
    Route::put('/generate', 'DecissionController@generate')->name('decission.generate');
    // Route::get('/create', 'DecissionController@create')->name('decission.create');
    // Route::get('/{id}', 'DecissionController@show')->name('decission.show');
    // Route::put('/', 'DecissionController@store')->name('decission.store');
});