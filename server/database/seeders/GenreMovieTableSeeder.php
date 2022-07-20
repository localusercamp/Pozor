<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GenreMovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($movie_id = 1; $movie_id <= 20; $movie_id++) {

            $genres_id_arr = $this->UniqueRandomNumbersWithinRange(1, GenresTableSeeder::GENRE_COUNT, rand(3,10));

            foreach ($genres_id_arr as $genre_id) {
                DB::table('genre_movie')->insert([
                    'genre_id' => $genre_id,
                    'movie_id' => $movie_id,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        }
    }

    private function UniqueRandomNumbersWithinRange(int $min, int $max, int $quantity)
    {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
}
