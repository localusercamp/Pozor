<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PostersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([
            'name' => 'DefenderOfTheSun_Poster',
            'path' => File::generateSavedPath('Defender Of The Sun',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'AssassinOfTheVoid_Poster',
            'path' => File::generateSavedPath('Assassin Of The Void',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'AngelOfTheStars_Poster',
            'path' => File::generateSavedPath('Angel Of The Stars',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'MedicOfTheGalaxy_Poster',
            'path' => File::generateSavedPath('Medic Of The Galaxy',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'CreaturesOfWar_Poster',
            'path' => File::generateSavedPath('Creatures Of War',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'TraitorsInTheBeginningOfTime_Poster',
            'path' => File::generateSavedPath('Traitors In The Beginning Of Time',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'AndroidsInTheBeginningOfTime_Poster',
            'path' => File::generateSavedPath('Androids In The Beginning Of Time',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'BeastsOfWar_Poster',
            'path' => File::generateSavedPath('Beasts Of War',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'AssassinsAndFigures_Poster',
            'path' => File::generateSavedPath('Assassins And Figures',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'HumansAndFriends_Poster',
            'path' => File::generateSavedPath('Humans And Friends',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'BeastsAndCreators_Poster',
            'path' => File::generateSavedPath('Beasts And Creators',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'SpiesAndRecruits_Poster',
            'path' => File::generateSavedPath('Spies And Recruits',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'PlanetOfTheSun_Poster',
            'path' => File::generateSavedPath('Planet Of The Sun',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'SignsOfAliens_Poster',
            'path' => File::generateSavedPath('Signs Of Aliens',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'InfluenceOfOuterSpace_Poster',
            'path' => File::generateSavedPath('Influence Of Outer Space',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'CarnageOfTheVacuum_Poster',
            'path' => File::generateSavedPath('Carnage Of The Vacuum',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'DisguisedByMyPlanet_Poster',
            'path' => File::generateSavedPath('Disguised By My Planet',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'AnxiousForTheDepths_Poster',
            'path' => File::generateSavedPath('Anxious For The Depths',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'LifeWithTheSecrets_Poster',
            'path' => File::generateSavedPath('Life With The Secrets',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('files')->insert([
            'name' => 'FortuneOfTimeTravellers_Poster',
            'path' => File::generateSavedPath('Fortune Of Time Travellers',File::POSTER_PATH),
            'extension' => '.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
