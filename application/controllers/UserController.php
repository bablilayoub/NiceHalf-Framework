<?php

namespace NicehalfCore\App\Controllers;

use NicehalfCore\System\Database;
use NicehalfCore\System\View;

class UserController
{
    public function index()
    {   
        $users = Database::table('users')->paginate(5);
        return View::render('user.index', ['users' => $users]);
    }
}
