<?php

namespace App\Http\Controllers\Frontend;
use App\Models\BookFest;

class HomeController
{
    public function index()
    {
        
        $bookfest = BookFest::where('status', 'active')->latest()->first();

        return view('frontend.home', compact('bookfest'));
    }
}
