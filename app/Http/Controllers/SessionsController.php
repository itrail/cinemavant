<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return "Zalogowano";
        }
        else{
            return "Nie udało się zalogować";
        }
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/pages');
    }
}
