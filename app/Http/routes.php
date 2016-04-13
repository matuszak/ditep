<?php
Route::group(['middleware' => ['web']], function () {


//rota de impressoras e clientes
  Route::group(['prefix' => 'ditep'], function(){
    Route::controller('impressoras', 'ImpressoraController');
    Route::controller('clientes', 'ClienteController');
    Route::controller('setores', 'SetorController');
    Route::controller('toners', 'TonerController');
    Route::controller('impressoes', 'ImpressaoController');
      Route::get('visual', 'DitepController@visual');

    Route::get('/', 'DitepController@index');
  });
});

//------------------------------------------------------------------------
//Route::get('impressoras', 'ImpressoraController@index');



Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
