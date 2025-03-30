<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class portraitController extends Controller
{
    public function index()
    {
        return view('portrait.index'); // portrait.index will be called here 
    }
    
    public function about()
    {
        return view('portrait.about'); // portrait.about will be called here issue
    }
}
