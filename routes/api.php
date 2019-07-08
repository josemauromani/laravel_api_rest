<?php 
Route::get('/clientes','Api\ClienteApiController@index');
Route::get('/clientes/{id}','Api\ClienteApiController@show');

Route::post('/clientes','Api\ClienteApiController@store');