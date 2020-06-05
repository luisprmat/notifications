<?php

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

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::post('messages', 'HomeController@store')->name('messages.store');
Route::get('messages/{message}', 'HomeController@show')->name('messages.show');
Route::get('notifications', 'NotificationController@index')->name('notifications.index');
Route::patch('notifications/{notification}', 'NotificationController@read')->name('notifications.read');
Route::delete('notifications/{notification}', 'NotificationController@destroy')->name('notifications.destroy');
