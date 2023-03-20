<?php

namespace App\Services;

use App\Http\Requests\LigaRequest;
use App\Models\Liga;
use Illuminate\Http\Request;

class LigaService
{
    public function store(LigaRequest $request)
    {
        $home_club = Liga::where('club_id', '=', $request->home_club)->get();
        $away_club = Liga::where('club_id', '=', $request->away_club)->get();
        $home_club[0]->qty_match++;
        $away_club[0]->qty_match++;
        $home_club[0]->GM = $home_club[0]->GM + $request->scoreClub0;
        $away_club[0]->GM = $away_club[0]->GM + $request->scoreClub1;

        $home_club[0]->GK = $home_club[0]->GK + $request->scoreClub1;
        $away_club[0]->GK = $away_club[0]->GK + $request->scoreClub0;

        if ($request->scoreClub0 == $request->scoreClub1) {
            $home_club[0]->draw++;
            $away_club[0]->draw++;
            $home_club[0]->point++;
            $away_club[0]->point++;
        } else if ($request->scoreClub0 >= $request->scoreClub1) {
            $home_club[0]->win++;
            $away_club[0]->lose++;
            $home_club[0]->point = $home_club[0]->point + 3;
        } else {
            $away_club[0]->win++;
            $home_club[0]->lose++;
            $away_club[0]->point = $away_club[0]->point + 3;
        }
        $home_club[0]->save();
        $away_club[0]->save();
        notify()->success('Match saved successfully! ⚡️');
    }

    public function multipleMatch(Request $request)
    {
        $club_data = array_values($request->club);
        for ($i = 0; $i < count($club_data); $i++) {
            $request->validate([
                'scor.*' => 'required|numeric|min:0',
                'club.' . $i => ['required', 'different:club.' . $i + 1],
            ]);

            $score = $request->scor;

            if ($i % 2 == 0) {
                $next_club = $i + 1;

                $home_club = Liga::where('club_id', '=', $request->club[$i])->get();
                $away_club = Liga::where('club_id', '=', $request->club[$next_club])->get();
                $home_club[0]->qty_match++;
                $away_club[0]->qty_match++;
                if ($score[$i] == $score[$next_club]) {
                    # seri
                    $home_club[0]->draw++;
                    $away_club[0]->draw++;
                    $home_club[0]->point++;
                    $away_club[0]->point++;
                } elseif ($score[$i] > $score[$next_club]) {
                    # home menang
                    $home_club[0]->win++;
                    $away_club[0]->lose++;
                    $home_club[0]->point = $home_club[0]->point + 3;
                } else {
                    # away menang
                    $away_club[0]->win++;
                    $home_club[0]->lose++;
                    $away_club[0]->point = $away_club[0]->point + 3;
                }
                $home_club[0]->GM = $home_club[0]->GM + $score[$i];
                $away_club[0]->GM = $away_club[0]->GM + $score[$next_club];

                $home_club[0]->GK = $home_club[0]->GK + $score[$next_club];
                $away_club[0]->GK = $away_club[0]->GK + $score[$i];

                $home_club[0]->save();
                $away_club[0]->save();
            }
        }
        notify()->success('All match saved successfully! ⚡️');
    }
}
