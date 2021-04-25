<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayersApiController extends Controller
{
    public function index()
    {
        return Player::query()->orderByDesc('score')->limit(10)->get();
    }

    public function allPlayers()
    {
        //return Player::all();
        return Player::query()->join('type_logs', 'players.id', '=', 'type_logs.player_id')->get();
    }

    public function playersFromDate(string $date)
    {
        $timestamp =  date("Y-m-d", strtotime($date));
        return Player::query()->join('type_logs', 'players.id', '=', 'type_logs.player_id')->where('players.created_at', '>', $timestamp)->get();
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'score' => 'required',
            'mistakes' => 'required',
            'WPM' => 'required'
        ]);

        Player::create($request->all());
        (new TypeLogsController())->store($request);
        return response();
    }
}
