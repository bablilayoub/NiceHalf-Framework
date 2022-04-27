<?php

namespace NicehalfCore\App\Controllers;

use NicehalfCore\System\View;

class UserController
{
    public function index()
    {
        return View::render('user.index', array('name' => 'John Doe'));
    }

    public function show($id)
    {
        return 'User ' . $id;
    }
}
