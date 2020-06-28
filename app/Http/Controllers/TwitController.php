<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Twit;
use App\Events\AddTwitEvent;

class TwitController extends Controller
{
    public function getTwitsPage() {

        return view('twits/list', [
            'twits' => $this->getTwits()
        ]);
    }

    public function addTwit(Request $request) {

        $twit = Twit::create([
            'CategoryId' => $request->input('category'),
            'Username' => $request->input('name'),
            'Content' => $request->input('text'),
        ]);

        return $twit;
    }

    public function getTwits() {

        $twits = Twit::orderBy('Id', 'DESC')->get();

        return $twits;
    }

    public function getTwitsJson() {

        return json_encode($this->getTwits());
    }

    public function eventAddTwit(Request $request) {

        $this->addTwit($request);

        $twits = $this->getTwits();

        event(
            new AddTwitEvent($twits)
        );

        return $twits;
    }
}
