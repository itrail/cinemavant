<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepertoireController extends Controller
{
    public function repertoire()
    {
        return view('pages.repertoire');
    }
}
