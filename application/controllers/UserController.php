<?php

namespace NicehalfCore\App\Controllers;

use NicehalfCore\App\Models\User;
use NicehalfCore\System\Extra\Url;
use NicehalfCore\System\Views\View;

class UserController
{
    public function index()
    { 
        $users = User::paginate(1);
        return view('user.index', ['users' => $users]);
    }
}
