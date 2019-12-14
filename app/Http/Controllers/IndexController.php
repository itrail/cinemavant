<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class IndexController extends Controller
{
    public function index()
    {

        return view('pages.index');
    }

    public function show()
    {
        return view('pages.create');
    }

    public function login()
    {
        return 'it works';
    }
}
