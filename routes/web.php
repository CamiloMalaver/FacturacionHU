<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('index');});
Route::get('Archivos', 'archivos@getView')->name('getArchivosView');

