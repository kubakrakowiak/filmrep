<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DirectorMovies extends Pivot
{
    protected $table = 'director_movies';

    use HasFactory;
}
