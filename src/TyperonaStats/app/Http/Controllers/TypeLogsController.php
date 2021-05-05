<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\TypeLog;
use Illuminate\Http\Request;

class TypeLogsController extends Controller
{
    public function store(Request $request, int $player_id)
    {
        request()->validate([
            'wordSequences' => 'required',
        ]);

        $typingSequencesArray = json_decode($request->getContent(), true);

        foreach ($typingSequencesArray['wordSequences']['typingSequences'] as $seq) {
            $word = $seq['Word'];
            $type_sequence = $seq['Sequence'];
            TypeLog::create([
                'player_id' => $player_id,
                'word' => $word,
                'type_sequence' => $type_sequence
            ]);
        }
    }
}
