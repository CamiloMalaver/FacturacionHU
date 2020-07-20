<?php

use Illuminate\Support\Facades\Route;

Route::get('/print/{id}', 'archivos@print');
Route::get('/', 'index@getView');
Route::get('Archivos', 'archivos@getView')->name('getArchivosView');
Route::get('Clientes', 'clientes@getView')->name('getClientesView');
Route::get('ArchivosCuent', 'archivos@getCuentView')->name('getClientesCuentView');
Route::post('addClient', 'clientes@addClient')->name('postAddClient');
Route::post('addDoc', 'Archivos@addNewDoc')->name('postAddDoc');
