<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateController extends Controller
{
 public function create()
 {
     return view('create'); 
 }
 public function  index () {
    return view ('home.create');
    
 }
}
