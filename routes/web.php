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
$router->group(['prefix' => 'api/hospital'], function () use ($router) {
    $router->get('/', 'HospitalController@index');
    $router->get('{id}', 'HospitalController@show');
    $router->post('/', 'HospitalController@store');
    $router->put('{id}', 'HospitalController@update');
    $router->delete('{id}', 'HospitalController@destroy');
});

