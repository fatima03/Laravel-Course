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
	return "<h3>Landon Page</h3>";
    // return view('welcome');
});

Route::get('/about', function () {
	$response_arr = [];
	$response_arr['author'] = 'FM';
	$response_arr['version'] = '0.1.1';
	return $response_arr;
	// return "<h3>About</h3>";
    // return view('welcome');
});

Route::get('/home', function () {
	$data = [];
	$data['version'] = '0.1.1';
    return view('welcome', $data);
});

Route::get('/di', 'ClientController@di');

Route::get('/facades/db', function () {
	return DB::select('SELECT * FROM TABLE');
});

Route::get('/facades/encrypt', function () {
	return Crypt::encrypt('1234567');
});

Route::get('/facades/decrypt', function () {
	return Crypt::decrypt('BooteyJpdiI6InVET3kzRXlJYXVQaDJYdGI2dkxicVE9PSIsInZhbHVlIjoiQ3ZId3hEV0RkVHBHQ25tWFRSSERwdz09IiwibWFjIjoiZDcwOGRjYTA3Nzg5MTY2N2I2YmQ1NTk5ZDdmYmFhNGQ5NThmMzUwOTQ4YWE5OTZiOWQ1MTUxY2Y5M2RkYTMzOSJ9');
});