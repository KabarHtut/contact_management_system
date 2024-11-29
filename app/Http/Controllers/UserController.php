<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $view = 'user.';

    public function profile()
    {
        return view($this->view . 'profile');
    }
}
