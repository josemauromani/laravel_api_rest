<?php 

Route::get('clientes','Api\ClienteApiController@index');
Route::post('clientes','Api\ClienteApiController@store');