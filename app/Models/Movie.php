<?php

namespace App\Models;

use App\Models\Actor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'premiere',
        'place',
        'desc',
    ];

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movie');
    }
    public function directors()
    {
        return $this->belongsToMany(Director::class, 'director_movies');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }
}
