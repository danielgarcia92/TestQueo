<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function indexAction()
    {
        $users = User::all();

        return view('users.index')
            ->with('title', 'Listado de usuarios')
            ->with(compact('users'));
    }

}
