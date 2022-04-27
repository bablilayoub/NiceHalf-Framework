<?php

// USE ROUTER CLASS
use NicehalfCore\System\Route;

// Add routes
Route::get('/', function () {
    return 'Hello World';
});

Route::get('users', 'UserController@index');

Route::prefix('admin', function () {
    Route::get('dashboard', 'UserController@index');
});
