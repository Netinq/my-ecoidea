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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', 'HomeController@index')->name('home');
Route::get('concept', 'HomeController@concept')->name('concept');
Route::get('search', 'HomeController@search')->name('search');

Route::resource('idea', 'IdeaController');
Route::post('/idea/{id}/react', 'IdeaController@react')->name('idea.react');

Route::resource('profile', 'ProfileController');
Route::post('/profile/{id}', 'ProfileController@updateAvatar');

Route::get('cgu', function(){
    return 'Voilà les CGU :o';
})->name('cgu');

Auth::routes();
Route::get('/confirm/{id}/{token}', 'Auth\RegisterController@confirm')->name('auth.confirm');;

