<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'origin',
        'dob',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'actor_movie');
    }

}
