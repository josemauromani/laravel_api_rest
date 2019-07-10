<?php 
Route::get('/clientes','Api\ClienteApiController@index');
Route::get('/clientes/{id}','Api\ClienteApiController@show');
Route::delete('/clientes/{id}','Api\ClienteApiController@destroy');

Route::post('/clientes','Api\ClienteApiController@store');