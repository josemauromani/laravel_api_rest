<?php
Route::get('/clientes', 'Api\ClienteApiController@index');
Route::get('/clientes/{id}', 'Api\ClienteApiController@show');
Route::delete('/clientes/{id}', 'Api\ClienteApiController@destroy');
Route::put('/clientes/{id}', 'Api\ClienteApiController@update');
Route::post('/clientes', 'Api\ClienteApiController@store');
Route::get('/clientes/{id}/telefones', 'Api\ClienteApiController@telefones')->middleware('auth:api');
Route::get('/clientes/{id}/locacoes', 'Api\ClienteApiController@locacoes');


Route::get('/telefones', 'Api\TelefoneApiController@index');
Route::get('/telefones/{id}/clientes', 'Api\TelefoneApiController@clientes');

Route::get('/filmes', 'Api\FilmeApiController@index');
Route::get('/filmes/{id}/locacoes', 'Api\FilmeApiController@locacoes');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
