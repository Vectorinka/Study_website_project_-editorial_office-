<?php

use App\Http\Middleware\IsAutuMiddleware;
use App\Models\Conf;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'confs' => Conf::all(),
    ]);
})->name('home');

Route::get('/developer', function () {
    return view('developer');
})->name('developer');

Route::namespace('App\\Http\\Controllers')->group(function() {
    Route::get('/conf', 'ConfController@index')->name('conf');
    Route::post('/conf', 'ConfController@store');

    Route::get('/gallery','GalleryController@index')->name('gallery');
    Route::post('/gallery','GalleryController@store');

    Route::get('/reg','RegController@index')->name('reg');
    Route::post('/reg','RegController@store');

    Route::get('/log','LogController@index')->name('log');
    Route::post('/log','LogController@store');

    Route::get('/logout', 'LogController@logout')->name('logout');

    Route::middleware(IsAutuMiddleware::class)->group(function() {
        Route::get('/twitter','TwitterController@index')->name('twitter');
        Route::post('/twitter','TwitterController@store');

        Route::get('/dtweet','TwitterController@delete')->name('dtweet');

        Route::get('/test', 'TestController@index')->name('test');
        Route::post('/test','TestController@store');

        Route::get('/dtest','TestController@delete')->name('dtest');
    });

});
