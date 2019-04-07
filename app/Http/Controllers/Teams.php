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
    public function teams(Request $request, Player $player)
    {   
        $players = Player::all();
        // ->only('name', 'rating')

        // $teamA = $this->rating_sort($players);
        // $teamB = $this->rating_sort($players);

        $begPlayers = $players->where('rating', 1)->shuffle();
        $intPlayers = $players->where('rating', 2)->shuffle();
        $advPlayers = $players->where('rating', 3)->shuffle();

        // split each ratings group in half -as and bs
        $halfBegPlayers = $begPlayers->count() / 2; 
        $halfIntPlayers = $intPlayers->count() / 2;
        $halfAdvPlayers = $advPlayers->count() / 2;

        // slice
        $begPlayersA = $begPlayers->slice(0, $halfBegPlayers);
        $begPlayersB = $begPlayers->slice($halfBegPlayers);

        $intPlayersA = $intPlayers->slice(0, $halfIntPlayers);
        $intPlayersB = $intPlayers->slice($halfBegPlayers);

        $advPlayersA = $advPlayers->slice(0, $halfAdvPlayers);
        $advPlayersB = $advPlayers->slice($halfBegPlayers);

        $teamA = $begPlayersA->merge($intPlayersA)->merge($advPlayersA);
        $teamB = $begPlayersB->merge($intPlayersB)->merge($advPlayersB);


        return response()->Json(array(
            'teamA' => $teamA, //send an array of players' names and ratings
            'teamB' => $teamB,
            // 'players'=> $players,
        ));
        //Respone(['teamA'=>'$teamA', 'teamB'=>'$teamB'], HTTP_OK);
    }

//     public function rating_sort($players)
//     {
//         // refactor using chunks
//         // might need to make them collections
//         $begPlayers = $players->where('rating', 1)->shuffle();
//         $intPlayers = $players->where('rating', 2)->shuffle();
//         $advPlayers = $players->where('rating', 3)->shuffle();

//         // split each ratings group in half -as and bs
//         $halfBegPlayers = $begPlayers->count() / 2; 
//         $halfIntPlayers = $intPlayers->count() / 2;
//         $halfAdvPlayers = $advPlayers->count() / 2;

//         // slice
//         $begPlayersA = $begPlayers->slice(0, $halfBegPlayers);
//         $begPlayersB = $begPlayers->slice($halfBegPlayers);

//         $intPlayersA = $intPlayers->slice(0, $halfIntPlayers);
//         $intPlayersB = $intPlayers->slice($halfBegPlayers);

//         $advPlayersA = $advPlayers->slice(0, $halfAdvPlayers);
//         $advPlayersB = $advPlayers->slice($halfBegPlayers);


//         // $begPlayersA = $begPlayers->limit($halfBegPlayers);
//         // $begPlayersB = $begPlayers->skip($halfBegPlayers);

//         // $intPlayersA = $intPlayers->limit($halfIntPlayers);
//         // $intPlayersB = $intPlayers->skip($halfIntPlayers);

//         // $advPlayersA = $advPlayers->limit($halfAdvPlayers);
//         // $advPlayersB = $advPlayers->skip($halfAdvPlayers);
        

//         // add as and bs together to get 2 teams
//         return
//         $teamA = $begPlayersA->merge($intPlayersA)->merge($advPlayersA);
//         $teamB = $begPlayersB->merge($intPlayersB)->merge($advPlayersB);

// //         $concatenated = $collection->concat(['Jane Doe'])->concat(['name' => 'Johnny Doe']);

// // $concatenated->all();
// // implode?



//         // // other ways to split the ratings groups
//         // $half = ceil($collection->count() / 2);

//         // //or

//         // $collection = collect([1, 2, 3, 4, 5]);

//         // $chunk = $collection->slice(0,ceil($collection->count() / 2));


//         // $chunks = $collection->chunk($half);


//     //     return
//     }

    // public function index()
    // {
    //     return TeamListResource::collection(Team::all());
    // }

    // // public function store(TeamRequest $request)
    // // {
    // //     $data = $request->all();
    // //     $team = Team::create($data);
    // //     return new TeamResource($team);
    // }

    // public function show(Team $team)
    // {
    //     $team = Team::find($team);
    //     return new TeamResource($team);
    // }

    // public function update(TeamRequest $request, Team $team)
    // {
    //     $data = $request->only(["name", "rating"]);
    //     $team = Team::create($data);

    //     $team->fill($data)->save();
    //     return new TeamResource($team);
    // }

    // public function destroy(Team $team)
    // {
    //     $team->delete();
    //     return response(null, 204);
    // }
}
