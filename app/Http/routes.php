<?php
Route::group(['middleware' => ['web']], function () {
  Route::get('/', 'DitepController@index');

//rota de impressoras e clientes
  Route::group(['prefix' => 'ditep'], function(){
    Route::controller('impressoras', 'ImpressoraController');
    Route::controller('clientes', 'ClienteController');
  });
});

//------------------------------------------------------------------------
//Route::get('impressoras', 'ImpressoraController@index');



Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
