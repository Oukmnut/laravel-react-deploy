<?php

namespace App\Http\Controllers;

use App\Services\D1Service;

class UserController extends Controller
{
    protected $d1;

    public function __construct(D1Service $d1)
    {
        $this->d1 = $d1;
    }

    public function index()
    {
        $users = $this->d1->getUsers();

        return view('users.index', compact('users'));
    }
}
