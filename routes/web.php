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
    return view('app');
});
Route::get('/jobs', 'JobController@all')->name('jobs.all');
Route::post('/jobs', 'JobController@store')->name('jobs.store');
Route::get('/jobs/{job}', 'JobController@show')->name('jobs.show');
Route::get('/jobs/{job}', 'JobController@update')->name('jobs.update');
Route::put('/jobs/{job}', 'JobController@updateJob')->name('jobs.updateJob');

// Processors
Route::get('/processors', 'JobController@allProcessors');