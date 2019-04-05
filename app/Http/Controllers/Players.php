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

    public function show($id)
    {
        return Player::find($id);
    }

    public function update(Request $request, $id)
    {
        $player = Player::find($id);
        $data = $request->all();
        $player->fill($data)->save();
        return $player;
    }

    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();
        return response(null, 204),
    }
}
