<?php

// USE ROUTER CLASS
use NicehalfCore\System\Routers\Route;

// Add routes
Route::get('/', function () {
    return 'Hello World';
});

Route::get('/home', 'HomeController@index');