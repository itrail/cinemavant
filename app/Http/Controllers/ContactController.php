<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        if($request->session()->has('name')) {
            $user = $request->session()->get('name');
            $flag = true;
            return view('pages.contact', ['user' => $user], ['flag' => $flag]);
        }
        else {
            $flag = false;
            return view('pages.contact', ['flag' => $flag]);
        }
    }
}
