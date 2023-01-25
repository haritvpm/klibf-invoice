<?php

namespace App\Http\Controllers\Frontend;
// use App\Models\BookFest;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        
       // $bookfest = BookFest::where('status', 'active')->latest()->first();

        return view('frontend.home');
    }
}
