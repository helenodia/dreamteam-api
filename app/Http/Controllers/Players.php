<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\PlayerListResource;


class Players extends Controller
{
    public function index()
    {
        return PlayerListResource::collection(Player::all());
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $player = Player::create($data);
        return new PlayerResource($player);
    }

    public function show(Player $player)
    {
        $player = Player::find($player);
        return new PlayerResource($player);
    }

    public function update(Request $request, Player $player)
    {
        $data = $request->only(["name", "rating"]);
        $player = Player::create($data);

        $player->fill($data)->save();
        return new PlayerResource($player);
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return response(null, 204);
    }
}
