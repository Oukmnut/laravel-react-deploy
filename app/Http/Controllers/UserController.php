<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\D1Service;

class UserController extends Controller
{
    public function index(D1Service $d1)
    {
        $users = $d1->getUsers();
        return view('users.index', compact('users'));
    }
}
