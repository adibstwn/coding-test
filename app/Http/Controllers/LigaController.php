<?php

namespace App\Http\Controllers;

use App\Http\Requests\LigaRequest;
use App\Models\Club;
use App\Models\Liga;
use App\Services\LigaService;
use Illuminate\Http\Request;

class LigaController extends Controller
{
    protected $ligaService;

    public function __construct(LigaService $ligaService)
    {
        $this->ligaService = $ligaService;
    }

    public function index()
    {
        $data = Liga::join('club', 'club.id', '=', 'liga.club_id')->orderBy('liga.point', 'desc')->orderBy('liga.win', 'desc')->orderBy('liga.GM', 'desc')->orderBy('club.name', 'asc')
            ->get(['club.name', 'liga.win', 'liga.lose', 'liga.draw', 'liga.GM', 'liga.GK', 'liga.point', 'liga.qty_match']);

        return view('liga.index', compact(
            'data'
        ));
    }

    public function create()
    {
        $data = new Liga;
        $club = Club::all();
        return view('liga.create', compact(
            'data',
            'club'
        ));
    }

    public function store(LigaRequest $request)
    {
        $this->ligaService->store($request);
        return redirect('liga');
    }

    public function multipleMatch(Request $request)
    {
        $this->ligaService->multipleMatch($request);
        return redirect('liga');
    }
}
