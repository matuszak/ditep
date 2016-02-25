<?php
Route::group(['middleware' => ['web']], function () {
  Route::get('/', 'DitepController@index');

//rota de impressoras
  Route::group(['prefix' => 'ditep'], function(){
    Route::controller('impressoras', 'ImpressoraController');
  });

});


//------------------------------------------------------------------------
//Route::get('impressoras', 'ImpressoraController@index');
/*Route::group(['middleware' => ['web']], function () {
    //
});*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
