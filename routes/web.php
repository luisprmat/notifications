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
})->name('home');

Auth::routes();

Route::get('messages/create', 'MessageController@create')->name('messages.create');
Route::post('messages', 'MessageController@store')->name('messages.store');
Route::get('messages/{message}', 'MessageController@show')->name('messages.show');
Route::get('notifications', 'NotificationController@index')->name('notifications.index');
Route::patch('notifications/{notification}', 'NotificationController@read')->name('notifications.read');
Route::delete('notifications/{notification}', 'NotificationController@destroy')->name('notifications.destroy');
