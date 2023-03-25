<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Matches;
use App\Services\MatchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    protected $matchService;

    public function __construct(MatchService $matchService)
    {
        $this->matchService = $matchService;
    }
    public function index()
    {
        $data = DB::table('matches')
            ->leftjoin('club AS A', 'A.id', '=', 'matches.home')
            ->leftjoin('club AS B', 'B.id', '=', 'matches.away')
            ->leftjoin('club AS C', 'C.id', '=', 'matches.address')
            ->select('matches.*', 'A.name as home_name', 'B.name as away_name', 'C.city as address_name')
            ->get();
        return view('match.index', compact(
            'data'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Matches;
        $club = Club::all();
        return view('match.create', compact(
            'data',
            'club'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->matchService->store($request);
        return redirect('match');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
