<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Twit;

class HomeController extends Controller
{
    public function home() {

        $twits = Twit::all();

        return view('home/home', compact('twits'));
    }
}
