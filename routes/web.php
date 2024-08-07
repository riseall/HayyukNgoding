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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('data_peserta','App\Http\Controllers\DataPesertaController@index')->name('data_peserta.index');

Route::get('data_peserta/create','App\Http\Controllers\DataPesertaController@create')->name('data_peserta.create');

Route::post('data_peserta/store','App\Http\Controllers\DataPesertaController@store')->name('data_peserta.store');

Route::get('data_peserta/edit/{id}', 'App\Http\Controllers\DataPesertaController@edit')->name('data_peserta.edit');

Route::post('data_peserta/update/{id}', 'App\Http\Controllers\DataPesertaController@update')->name('data_peserta.update');

Route::post('data_peserta/delete/{id}', 'App\Http\Controllers\DataPesertaController@destroy')->name('data_peserta.destroy');

Route::get('pelatihan', 'App\Http\Controllers\PelatihanController@index')->name('pelatihan.index');

Route::get('pelatihan/create', 'App\Http\Controllers\PelatihanController@create')->name('data_pelatihan.create');

Route::post('pelatihan/store', 'App\Http\Controllers\PelatihanController@store')->name('pelatihan.store');

Route::get('pelatihan/detail_peserta/{id}', 'App\Http\Controllers\PelatihanController@detail_peserta')->name('pelatihan.detail_peserta');

Route::get('pelatihan/detail_kelas/{id}', 'App\Http\Controllers\PelatihanController@detail_kelas')->name('pelatihan.detail_kelas');

Route::get('data_peserta/search', 'App\Http\Controllers\DataPesertaController@search')->name('data_peserta.search');

Route::get('user', 'App\Http\Controllers\UserController@index')->name('user.index');

Route::get('user/create', 'App\Http\Controllers\UserController@create')->name('user.create');

Route::post('user/store', 'App\Http\Controllers\UserController@store')->name('user.store');

Route::get('user/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('user.edit');

Route::post('user/update/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');

Route::post('user/destroy/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');