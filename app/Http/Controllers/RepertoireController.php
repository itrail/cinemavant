<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepertoireController extends Controller
{
    public function repertoire(Request $request)
    {
        if($request->session()->has('name')) {
            $user = $request->session()->get('name');
            $flag = true;
            return view('pages.repertoire', ['user' => $user], ['flag' => $flag]);
        }
        else {
            $flag = false;
            return view('pages.repertoire', ['flag' => $flag]);
        }
    }
}

