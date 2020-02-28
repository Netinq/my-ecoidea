<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PanelController');

Route::group(['prefix' => 'users'], function (){
    Route::get('/', 'ProfilController@index');
});
