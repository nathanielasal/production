<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'sumber'], function () use ($router) {
    $router->post('/', ['uses' => 'SumberController@createSumber']);
    $router->get('/{id}', ['uses' => 'SumberController@getSumberById']);
    $router->patch('/{id}', ['uses' => 'SumberController@updateSumber']);
    $router->delete('/{id}', ['uses' => 'SumberController@deleteSumber']);
});
    
$router->group(['prefix' => 'history_produksi'], function () use ($router) {
    $router->post('/', ['uses' => 'HistoryProduksiController@createHistory']);
    $router->get('/{id}', ['uses' => 'HistoryProduksiController@getHistoryProduksiById']);
    $router->patch('/{id}' , ['uses' => 'HistoryProduksiController@updateHistory']);
    $router->delete('/{id}', ['uses' => 'HistoryProduksiController@deleteHistory']);
});
