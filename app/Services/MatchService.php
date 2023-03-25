<?php

namespace App\Services;

use App\Models\Club;
use App\Models\Matches;
use Illuminate\Http\Request;

class MatchService
{
    public function store(Request $request)
    {
        $match = new Matches;
        // dd($request);
        $match->home = $request->home;
        $match->away = $request->away;
        $match->address = $request->address;
        $match->price = $request->price;
        $match->available_seat = $request->available_seat;
        $match->match_day = $request->match_day;
        $match->time = $request->time;
        $match->save();
        notify()->success('Match created successfully! ⚡️');
    }
}
