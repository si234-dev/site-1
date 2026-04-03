<?php

use Illuminate\Support\Facades\DB;

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


$router->get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "DB Connected!";
    } catch (\Exception $e) {
        return "DB Connection FAILED: " . $e->getMessage();
    }
});





$router->get('/users', 'UserController@getUsers');
$router->post('/users', 'UserController@add');
$router->get('/users/{id}', 'UserController@show');     
$router->delete('/users/{id}', 'UserController@delete');
$router->put('/users/{id}', 'UserController@update');

$router->get('/userjob', 'UserJobController@index');
$router->get('/userjob/{id}', 'UserJobController@show');

