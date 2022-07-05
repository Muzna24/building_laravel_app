<?php

use App\Http\Controllers\IssuesController;
use Illuminate\Support\Facades\Auth;
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

//Route::view('addIssue', 'issues.issues');
Route::get('test', 'IssuesController@test');
Route::get('issue/list', 'IssuesController@list');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('grating','auth.grating');
Route::get('/user/{id}', 'idLoginController@userLogin');
Route::get('user','UsersController@export');
Route::view('import-file', 'issues.excel_import');
Route::post('issue/import', 'IssuesController@importExcelFile');

Route::prefix('issues')->group(function () {
    Route::get('/','CRUDIssuesControllers@index');
    Route::get('create','CRUDIssuesControllers@create');
    Route::get('edit/{id}','CRUDIssuesControllers@edit');
    Route::get('delete/{id}','CRUDIssuesControllers@destroy');
    Route::post('update/{id}','CRUDIssuesControllers@update');
    Route::post('/store', 'CRUDIssuesControllers@store');
});

//API testing
Route::get('data/{id}', 'APIController@getData');


