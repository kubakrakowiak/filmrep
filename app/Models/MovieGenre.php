<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MovieGenre extends Pivot
{
    protected $fillable=[
      'movie_id'
    ];
}
