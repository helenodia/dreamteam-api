<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Team;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\PlayerListResource;
use App\Http\Requests\PlayerRequest;


class Players extends Controller
{
    public function index(Team $team)
    {
        return PlayerResource::collection($team->players);
    }

    public function store(PlayerRequest $request, Team $team)
    {
        $player = new Player($request->all());
        // store player in DB and set team_id:
        $team->players()->save($comment)
        return new PlayerResource($player);
    }

    // public function show($id)
    // {
    //     //
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }
}
