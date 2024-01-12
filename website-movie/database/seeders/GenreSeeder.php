<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'name'=> 'Animation'
        ]);
        Genre::create([
            'name'=> 'Horror'
        ]);
        Genre::create([
            'name'=> 'Science Fiction'
        ]);
        Genre::create([
            'name'=> 'Fantasy'
        ]);
        Genre::create([
            'name'=> 'Adventure'
        ]);
        Genre::create([
            'name'=> 'Action'
        ]);
        Genre::create([
            'name'=> 'Romance'
        ]);
        Genre::create([
            'name'=> 'Crime'
        ]);
        Genre::create([
            'name'=> 'Drama'
        ]);
        Genre::create([
            'name'=> 'Comedy'
        ]);
        Genre::create([
            'name'=> 'Western'
        ]);
        Genre::create([
            'name'=> 'War'
        ]);
        Genre::create([
            'name'=> 'Thriller'
        ]);
        Genre::create([
            'name'=> 'Biography'
        ]);
        Genre::create([
            'name'=> 'History'
        ]);
        Genre::create([
            'name'=> 'Suspense'
        ]);
        Genre::create([
            'name'=> 'Family'
        ]);
        Genre::create([
            'name'=> 'Documentary'
        ]);
        Genre::create([
            'name'=> 'Music'
        ]);
        Genre::create([
            'name'=> 'TV Movie'
        ]);
        Genre::create([
            'name'=> 'Mystery'
        ]);
    }
}
