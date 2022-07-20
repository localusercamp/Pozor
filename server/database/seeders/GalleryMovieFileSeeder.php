<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GalleryMovieFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($file_id = 21; $file_id <= 26; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 27; $file_id <= 36; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 37; $file_id <= 43; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 44; $file_id <= 50; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 51; $file_id <= 58; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 59; $file_id <= 62; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 63; $file_id <= 70; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 7,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 71; $file_id <= 73; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 8,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 74; $file_id <= 77; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 9,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 78; $file_id <= 84; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 10,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 85; $file_id <= 91; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 92; $file_id <= 97; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 12,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 98; $file_id <= 104; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 13,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 105; $file_id <= 109; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 14,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 110; $file_id <= 114; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 15,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 115; $file_id <= 119; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 16,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 120; $file_id <= 126; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 17,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 127; $file_id <= 134; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 18,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 135; $file_id <= 139; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 19,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($file_id = 140; $file_id <= 146; $file_id++) {
            DB::table('gallery_movie')->insert([
                'file_id' => $file_id,
                'movie_id' => 20,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
