<?php

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

$app->get('/', function () use ($app) {
    return 'Pok&eacute;mon EV Tracker API &copy; Thoyib Antarnusa';
});


$app->get('users', UsersController@index);
$app->get('users/{id}', UsersController@getUser);
$app->post('users', UsersController@createUser);
$app->put('users/{id}', UsersController@updateUser);
$app->delete('users/{id}', UsersController@deleteUser);
