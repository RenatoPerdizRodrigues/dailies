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

//Colocamos uma rota prefixada de API
$router->group(['prefix' => 'api'], function () use ($router) {
    //Rotas de usuário
    $router->put('users/{id}/update', 'UserController@update');
    $router->post('users', 'UserController@store');
    $router->get('users/{id}', 'UserController@show');
    $router->get('users', 'UserController@index');

    //Rotas de task
    $router->post('tasks', 'TaskController@store');
    $router->put('tasks/{id}/update', 'TaskController@update');
    $router->get('tasks/{id}', 'TaskController@show');

    //Dailies
    $router->put('daily/done/{id}', 'DailyController@done');
    $router->post('daily/copy/{id}/{date}', 'DailyController@copy');
    $router->get('daily/all', 'DailyController@index');
    $router->get('daily[/{date}]', 'DailyController@show');

    //Login
    $router->post('login', 'AuthController@login');
    $router->get('logout', 'AuthController@logout');
});