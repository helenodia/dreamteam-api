<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;
use App\Http\Resources\TeamResource;
use App\Http\Resources\TeamListResource;
use App\Http\Requests\TeamRequest;

class Teams extends Controller
{    
    public function index()
    {
        return TeamListResource::collection(Team::all());
    }

    public function store(TeamRequest $request)
    {
        $data = $request->all();
        $team = Team::create($data);
        return new TeamResource($team);
    }

    public function show(Team $team)
    {
        $team = Team::find($team);
        return new TeamResource($team);
    }

    public function update(TeamRequest $request, Team $team)
    {
        $data = $request->only(["name", "rating"]);
        $team = Team::create($data);

        $team->fill($data)->save();
        return new TeamResource($team);
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return response(null, 204);
    }
}
