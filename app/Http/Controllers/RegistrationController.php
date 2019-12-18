<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function create(Request $request)
    {
        if(!($request->session()->has('name'))) {
            return view('registration.create');
    }
    else{
        return redirect('/');
    }
    }


    public function store(request $request)
    {
        try
        {
            $rules = [
                'firstname' => 'required|min:2',
                'surname' => 'required|min:2',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ];

            $this->validate(request(), $rules);

            $user = User::create(request(['firstname', 'surname', 'email', 'password']));

            Mail::send('emails.welcome',
                [
                    'user' => $user
                ], function ($message) use ($user)
                {
                    $message->from('cinemavant@gmail.com','Cinemavant');
                    $message->to($user->email, $user->name)->subject('Potwierdzenie założenia konta w serwisie Cinemavant');
                });

            //auth()->login($user);
            $request->session()->put('name',$user['email']);
            return back()->withInput();
        }
        catch (Exception $e)
        {
            return redirect()->to('/register')->withErrors(['Podano niepoprawne dane rejestracji. Spróbuj ponownie!', 'The Message']);
            //return 'Wystąpił wyjątek nr '.$e->getCode().', jego komunikat to:.$e->getMessage();
        }

    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}

