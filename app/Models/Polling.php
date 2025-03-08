<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;

    // Specify the table associated with the model (optional if the table name follows Laravel's naming convention)
    protected $table = 'polling';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'election_name',
        'votes',
        'voter',
    ];
}
