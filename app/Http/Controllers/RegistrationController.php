<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }


    public function store()
    {
        try
        {
            $rules = [
                'firstname' => 'required',
                'surname' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ];

            $customMessages = [
                'required' => 'Pole wymagane'
            ];

            $this->validate(request(), $rules, $customMessages);

            $user = User::create(request(['firstname', 'surname', 'email', 'password']));


            Mail::send('emails.welcome',
                [
                    'user' => $user
                ], function ($message) use ($user)
                {
                    $message->from('cinemavant@gmail.com','Cinemavant');
                    $message->to($user->email, $user->name)->subject('Potwierdzenie założenia konta w serwisie Cinemavant');
                });

            auth()->login($user);

            return redirect()->to('/index');
        }
        catch (Exception $e)
        {
            return 'Wystąpił wyjątek nr '.$e->getCode().', jego komunikat to:
'.$e->getMessage();
        }

    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}

