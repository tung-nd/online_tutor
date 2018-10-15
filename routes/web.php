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

Route::get('/', function () {
    return view('index');
})->name('home');

//Các use case của người dùng chưa đăng nhập (hoặc đã đăng nhập)

Route::get('/tutor/search', 'TutorController@search');

Route::get('/tutor/detail/{id}', 'TutorController@getTutorDetailById');

