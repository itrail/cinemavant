<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceListController extends Controller
{
    public function price_list()
    {
        return view('pages.price_list');
    }
}
