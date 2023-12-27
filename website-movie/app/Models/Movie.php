<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

        // studio
        // runtime
        // tvNetwork
        // director
        // actors($gender=null, $count = 3, $duplicate = false)
    protected $fillable = [
        'title',
        'poster_path',
        'genres',
        'studio',
        'runtime',
        'director',
        'actor',
        'description',
        'released_date',
    ];

    public function scopeFilter($query, array $filters) {
        if ($filters['genre'] ?? false){
            $query->where('genres', 'like', '%'.$filters['genre']. '%');
        }

        if ($filters['search'] ?? false){
            $query->where('genres', 'like', '%' . $filters['search'] . '%')
                ->orWhere('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('actor', 'like', '%' . $filters['search'] . '%')
                ->orWhere('studio', 'like', '%' . $filters['search'] . '%');
        }
    }
}
