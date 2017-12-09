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

Route::get('/panel/user/{id}', 'UsersTableController@showUser');
Route::delete('/panel/user/{id}', 'UsersTableController@destroy');
Route::put('/panel/user/{id}/{column}/{value}', 'UsersTableController@updateUser');

Route::get('/panel/calendar', 'CalendarController@show');
Route::get('/panel/addSemester', 'SemesterController@create');
Route::post('/panel/addSemester', 'SemesterController@store');
Route::get('/panel/semester/{year}/{season}', 'SemesterController@show');

Route::get('/panel/groups', 'GroupController@index');
Route::get('/panel/groups/{id}', 'GroupController@show');
Route::delete('/panel/groups/{id}', 'GroupController@destroy');
Route::get('/panel/groups/{id}/addUsers', 'GroupController@addUsersView');
Route::post('/panel/groups/{id}/addUsers', 'GroupController@addUsers');
Route::get('/panel/groups/{id}/deleteUsers', 'GroupController@deleteUsersView');
Route::post('/panel/groups/{id}/deleteUsers', 'GroupController@deleteUsers');
Route::get('/panel/groups/{id}/changeLider', 'GroupController@changeLiderView');
Route::post('/panel/groups/{id}/changeLider', 'GroupController@changeLider');
Route::get('/panel/addGroup', 'GroupController@create');
Route::post('/panel/addGroup', 'GroupController@store');

Route::get('/panel/attendance', 'AttendanceController@index');
Route::get('/panel/attendance/{user_id}/{week_id}', 'AttendanceController@show');
Route::post('/panel/attendance/{user_id}/{week_id}', 'AttendanceController@store');
Route::put('/panel/attendance/{user_id}/{week_id}', 'AttendanceController@update');
Route::delete('/panel/attendance/{user_id}/{week_id}', 'AttendanceController@delete');
