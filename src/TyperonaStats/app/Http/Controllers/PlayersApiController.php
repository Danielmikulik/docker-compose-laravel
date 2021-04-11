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
        return Player::all();
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
