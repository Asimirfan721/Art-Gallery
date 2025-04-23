<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        return view('stock.index'); // stock.index will be called here 
    }
    public function about()
    {
        return view('stock.about'); // stock.about will be called here 
    }
}
