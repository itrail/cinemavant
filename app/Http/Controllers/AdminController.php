<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login(Request $request)
    {
            return view( 'sessions.admin');
    }

    public function index(Request $request)
    {
        if ($request->session()->has('name')) {
            $user = $request->session()->get('name');
            $admins = DB::table('users')->select('admin')->where('email', $user)->get();
            foreach($admins as $admin) {
                if ($admin->admin == 1) {
                    return view( 'pages.admin');
                }
                else return "Brak dostępu";
            }
        }
        else return "Brak dostępu";
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
        return redirect()->to('/admin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->put('name',$credentials['email']);
                        return redirect()->to('/admin/index');
        }
        else
            return redirect()->to('/admin')->withErrors(['Podano niepoprawne dane logowania. Spróbuj ponownie!', 'The Message']);;
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/pages');
    }
}

