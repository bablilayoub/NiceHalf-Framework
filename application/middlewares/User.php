<?php

namespace NicehalfCore\App\Middlewares;

class User
{
    public static function handle()
    {
        if(1 !== 1) {
            die('You are not allowed to access this page.');
        }
    }
}
