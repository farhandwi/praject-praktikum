<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));
        return [
            'title' => $faker->movie,
            'genres'=> implode(",", $faker->movieGenres(3, $duplicate = false)),
            'studio'=> $faker->studio,
            'runtime'=> $faker->runtime,
            'director'=> $this->faker->name(),
            'actor'=> $this->faker->name(),
            'description' => $faker->overview,
            'released_date' => $this->faker->date()
        ];
    }
}
