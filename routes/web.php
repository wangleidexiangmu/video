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

Route::get('oss1','Test\Testcontroller@oss1');
Route::get('oss2','Test\Testcontroller@oss2');
Route::get('oss3','Test\Testcontroller@oss3');