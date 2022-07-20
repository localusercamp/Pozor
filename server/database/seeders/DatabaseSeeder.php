<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            GenresTableSeeder::class,
            StatusesTableSeeder::class,

            PostersSeeder::class,
            GalleriesSeeder::class,

            MoviesTableSeeder::class,

            GenreMovieTableSeeder::class,
            PosterMovieFileSeeder::class,
            GalleryMovieFileSeeder::class
        ]);
    }
}
