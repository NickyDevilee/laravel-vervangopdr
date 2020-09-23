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

Route::get('/', [
	'uses' => 'App\Http\Controllers\SeriesController@GetAll',
	'as' => 'index'
]);

Route::get('/edit/{id}/{action}', [
	'uses' => 'App\Http\Controllers\SeriesController@GetFromID',
	'as' => 'series.edit'
]);

Route::get('/delete/{id}/{action}', [
	'uses' => 'App\Http\Controllers\SeriesController@GetFromID',
	'as' => 'series.delete'
]);

Route::post('/insert', [
	'uses' => 'App\Http\Controllers\SeriesController@Insert',
	'as' => 'insert'
]);

Route::post('/update', [
	'uses' => 'App\Http\Controllers\SeriesController@Update',
	'as' => 'update'
]);

Route::post('/delete', [
	'uses' => 'App\Http\Controllers\SeriesController@Delete',
	'as' => 'delete'
]);