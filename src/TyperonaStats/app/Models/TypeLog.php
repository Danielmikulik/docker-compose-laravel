<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id', 'word', 'type_sequence'
    ];

    protected $casts = [
        'type_sequence' => 'array'
    ];
}
