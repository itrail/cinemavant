<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('name')) {
            $user = $request->session()->get('name');
            return view('pages.index_auth', ['user' => $user]);
        }
        else
            return view( 'pages.index');
    }

    public function modify_data(Request $request)
    {
        if($request->session()->has('name')) {
            $user = $request->session()->get('name');
            $users = DB::table('users')->where('email', $user)->get();
            return view('pages.modify_data', ['users' => $users]);
        }
        else{
            return redirect('/');
        }
    }

    public function modify(Request $request)
    {
       try{
            if ($request->session()->has('name'))
            {
                $user = $request->session()->get('name');
                if (strlen(implode(request(['firstname']))) > 0 && $this->validate(request(), ['firstname' => 'min:2',])) {
                    $this->update_data($user, 'firstname', implode(request(['firstname'])));
                }
                if (strlen(implode(request(['surname']))) > 0 && $this->validate(request(), ['surname' => 'min:2',])) {
                    $this->update_data($user, 'surname', implode(request(['surname'])));
                }
                if (strlen(implode(request(['email']))) > 0 && $this->validate(request(), ['email' => 'email',])) {
                    $this->update_data($user, 'email', implode(request(['email'])));
                }
                return redirect()->to('/modify_data')->withErrors(['Poprawnie zaaktualizowano Twoje dane!', 'The Message']);
            }
       }
       catch (Exception $e) {
           return redirect()->to('/modify_data')->withErrors(['Podano niepoprawne dane rejestracji. Spróbuj ponownie!', 'The Message']);
       }
    }

    public function update_data($user, $field, $data)
    {
        DB::table('users')
            ->where('email', $user)
            ->update([$field => $data]);
    }

    public function change_password(Request $request)
    {
        if($request->session()->has('name')) {
            $user = $request->session()->get('name');
            $users = DB::table('users')->where('email', $user)->get();
            return view('pages.change_password', ['users' => $users]);
        }
        else{
            return redirect('/');
        }
    }

    public function change(Request $request)
    {
        //try{
            if ($request->session()->has('name'))
            {
                $user = $request->session()->get('name');
                $pass = DB::table('users')->select('password')->where('email', $user)->get()->first();
                $rules = [
                    'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                ];
                if ($pass ==  implode(request(['old_password']))/* && strlen(implode(request(['password']))) > 0 && $this->validate(request(), $rules)*/) {
                    $this->update_data($user, 'password', implode(request(['password'])));
                    return redirect()->to('/change_password')->withErrors(['Poprawnie zmieniono Twoje hasło!', 'The Message']);
                }
echo implode(request(['old_password']));
                echo $pass;

            }
        //}
        /*catch (Exception $e) {
            return redirect()->to('/change_password')->withErrors(['Podano niepoprawne dane w fomularzu. Spróbuj ponownie!', 'The Message']);
        }*/
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
