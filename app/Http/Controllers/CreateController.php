<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateController extends Controller
{
 public function create()
 {
     return view('create'); // create.blade.php will be called here
 }
}
