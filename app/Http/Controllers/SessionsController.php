<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SessionsController extends Controller
{
    public function login_form(Request $request)
    {
        if(!($request->session()->has('name'))) {
            return view('sessions.login');
        }
        else{
            return redirect('/index');
        }
    }

    public function accessSessionData(Request $request) {
        if($request->session()->has('name'))
            echo $request->session()->get('name');
        else
            echo 'No data in the session';
    }

    public function storeSessionData(Request $request) {
        $request->session()->put('name','Virat Gandhi');
        echo "Data has been added to session";
    }

    public function deleteSessionData(Request $request) {
        $request->session()->forget('name');
        echo "Data has been removed from session.";
        return back()->withInput();
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
                $request->session()->put('name',$credentials['email']);
                return back()->withInput();
            //return redirect()->to('/logged_index');
        }
        else
            return redirect()->to('/login')->withErrors(['Podano niepoprawne dane logowania. Spróbuj ponownie!', 'The Message']);;
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/pages');
    }
}
