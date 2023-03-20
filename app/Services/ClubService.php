<?php
namespace App\Services;

use App\Http\Requests\ClubRequest;
use App\Models\Club;
use App\Models\Liga;

class ClubService
{
    public function store(ClubRequest $request)
    {
        $club = new Club;
        $club->name = $request->name;
        $club->city = $request->city;
        $club->save();

        $liga = new Liga;
        $liga->qty_match = 0;
        $liga->win = 0;
        $liga->lose = 0;
        $liga->draw = 0;
        $liga->point =  0;
        $liga->GM = 0;
        $liga->GK = 0;
        $liga->club_id = $club->id;
        $liga->save();
        notify()->success('Club created successfully! ⚡️');
    }
    public function update(ClubRequest $request, $id)
    {
        $model = Club::find($id);
        $model->name = $request->name;
        $model->city = $request->city;
        $model->save();
        notify()->success('Club updated successfully! ⚡️');
    }
    public function destroy($id)
    {
        $model = Club::find($id);
        $model->delete();
        notify()->success('Club deleted successfully! ⚡️');
    }
}
