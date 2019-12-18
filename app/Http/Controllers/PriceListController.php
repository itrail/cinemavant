<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceListController extends Controller
{
    public function price_list(Request $request)
    {
        if($request->session()->has('name')) {
            $user = $request->session()->get('name');
            $flag = true;
            return view('pages.price_list', ['user' => $user], ['flag' => $flag]);
        }
        else {
            $flag = false;
            return view('pages.price_list', ['flag' => $flag]);
        }

    }
}
