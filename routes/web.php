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
    return view('welcome');
});


Route::get('/showArchive', 'App\Http\Controllers\archive_controller@join');
// show search results
Route::get('/search', 'App\Http\Controllers\archive_controller@search');
Route::get('/searchData', 'App\Http\Controllers\archive_controller@searchData');

//show cells
Route::get('/showCells/{id}', 'App\Http\Controllers\archive_controller@showCell')->name('showCell');

//show folders
Route::get('/showFolders/{id}', 'App\Http\Controllers\archive_controller@showFolder')->name('showFolder');

//create new cabinet
Route::post('/createCabinet', 'App\Http\Controllers\archive_controller@createCabinet')->name('showCabinet');

//create new cell
Route::post('/createCell/{id}', 'App\Http\Controllers\archive_controller@createCell')->name('createCell');


// create new folder
Route::post('/createFolder/{id}', 'App\Http\Controllers\archive_controller@createFolder')->name('createFolder');

//change location of folder
Route::post('/changeLocation/{id}', 'App\Http\Controllers\archive_controller@changeLocation')->name('changeLocation');
 // show change view

 Route::get('/changeView/{id}','App\Http\Controllers\archive_controller@changeView')->name('changeView');

 //show files

 Route::get('/showFiles/{id}','App\Http\Controllers\archive_controller@showFiles')->name('showFiles');


Route::post('/uploadFile/{id}', 'App\Http\Controllers\archive_controller@uploadFile')->name('uploadFile');


// view files
Route::get('/viewFile/{file_id}','App\Http\Controllers\archive_controller@viewFile')->name('viewFile');

//download files
Route::get('/downloadFile/{file}','App\Http\Controllers\archive_controller@downloadFile')->name('downloadFile');



//Delete Files
Route::delete('/deleteFolder/{id}','App\Http\Controllers\archive_controller@deleteFolder')->name('deleteFolder');
Route::delete('/deleteCell/{id}','App\Http\Controllers\archive_controller@deleteCell')->name('deleteCell');

