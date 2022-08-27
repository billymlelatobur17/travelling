<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;

class HomeController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['auth', 'verified']);
//    }

    public function index()
    {
        $items = TravelPackage::with('galleries')->get();
        return view('pages.home', ['items' => $items]);
    }
}
