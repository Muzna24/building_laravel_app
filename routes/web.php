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

Route::view('addIssue', 'issues.issues');
Route::post('issue/store', 'IssuesController@store');
Route::get('test', 'IssuesController@test');
Route::get('issue/list', 'IssuesController@list');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('grating','auth.grating');
Route::get('/user/{id}', 'idLoginController@userLogin');
Route::get('user','UsersController@export');