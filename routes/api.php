<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function (Request $request) {
    return '<b style="font-family: sans-serif;">MyEcoIdea API</b><br>Copyright 2019 © Tous les droits réservés<br>';
});

Route::get('upload/avatars/{filename}', function ($filename){
    $path = storage_path() . '/app/public/avatars/' . $filename;
    if(!File::exists($path)) abort('404');

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});
