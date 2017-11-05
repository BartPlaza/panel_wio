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
Route::get('/panel', function() {
	return view('panel');
})->name('panel')->middleware('auth');

Route::get('/login', 'LoginController@loginPage')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/panel/usersTable', 'UsersTableController@show');
Route::get('/panel/addUser', 'UsersTableController@addUser');
Route::post('/panel/addUser', 'UsersTableController@store');
Route::get('/panel/usersTable/filter', 'UsersTableController@filter');

Route::get('/panel/calendar', 'CalendarController@show');
Route::get('/panel/addSemester', 'SemesterController@create');
Route::post('/panel/addSemester', 'SemesterController@store');
Route::get('/panel/semester/{year}/{season}', 'SemesterController@show');