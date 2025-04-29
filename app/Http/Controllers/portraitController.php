<?php

namespace App\Http\Controllers; // define namespace

use Illuminate\Http\Request;

class portraitController extends Controller
{
    public function index()     //  index function
    {
        return view('portrait.index'); // portrait.index will be called here 
    }
    
    public function about()
    {
        return view('portrait.about'); // portrait.about will be called here issue
    }
    public function contact()
    {
        return view('portrait.contact'); // portrait.contact will be called here 
    }
}
