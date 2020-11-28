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


Route::get('/', 'IndexController@index');
Route::get('/admin', 'IndexController@index');
Route::get('/home', 'IndexController@index');

Route::get('/file_upload', 'FileUploadController@index');
Route::post('/api/file_upload', 'FileUploadController@fileUpload');

Route::get('/favorite_player', 'ModalWindowController@index');
Route::post('/api/favorite_player', 'ModalWindowController@favoritePlayer');

Route::get('/area_selection', 'AreaSelectionController@index');
