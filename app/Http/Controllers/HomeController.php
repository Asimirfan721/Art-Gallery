<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View; // view path

class HomeController extends Controller
{
    public function index() {
        return View::make('home'); // home.blade.php will be called here 
    } 
    public function about() {
        return view('about'); // about.blade.php will be called here 
    }    
    public function contact() {
        return view('contact'); // contact.blade.php will be called here 
    }
      
}
