<?php

use Illuminate\Support\Facades\Route;

Route::get('/print/{id}/{tipo}', 'archivos@print');
Route::get('/details/{id}', 'archivos@getDataEdit');
Route::get('/', 'index@getView');
Route::get('Archivos', 'archivos@getView')->name('getArchivosView');
Route::get('Clientes', 'clientes@getView')->name('getClientesView');
Route::post('addClient', 'clientes@addClient')->name('postAddClient');
Route::post('addDoc', 'Archivos@addNewDoc')->name('postAddDoc');
