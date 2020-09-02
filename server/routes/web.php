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
    $router->post('users/store', 'UserController@store');
    $router->get('users/profile', 'UserController@show');

    //Login
    $router->post('login', 'AuthController@login');
    $router->get('logout', 'AuthController@logout');
});