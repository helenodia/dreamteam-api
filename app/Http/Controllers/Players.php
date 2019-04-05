<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;

class Players extends Controller
{
    public function index()
    {
        return Player::all();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return Player::create($data);
    }

    public function show(Player $player)
    {
        return $player;
    }

    public function update(Request $request, Player $player)
    {
        $data = $request->only(["name", "rating"]);
        $player->fill($data)->save();
        return $player;
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return response(null, 204),
    }
}
