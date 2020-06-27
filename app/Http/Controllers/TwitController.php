<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Twit;

class TwitController extends Controller
{
    public function getTwitsPage() {

        return view('twits/list', [
            'twits' => $this->getTwits()
        ]);
    }

    public function addTwit(Request $request) {

        Twit::create([
            'CategoryId' => $request->input('category'),
            'Username' => $request->input('name'),
            'Content' => $request->input('text'),
        ]);

        return redirect()->back();
    }

    public function getTwits() {

        $twits = Twit::orderBy('Id', 'DESC')->get();

        return $twits;
    }

    public function getTwitsJson() {

        return json_encode($this->getTwits());
    }
}
