<?php

namespace NicehalfCore\App\Middlewares;

class User
{
    public static function handle()
    {
        if (!isset($_SESSION['user'])) {
            die('You are not allowed to access this page.');
        }
    }
}
