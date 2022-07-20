<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GalleriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 6; $i++) {
            DB::table('files')->insert([
                'name' => 'DefenderOfTheSun_Gallery' . $i,
                'path' => File::generateSavedPath('Defender Of The Sun',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 10; $i++) {
            DB::table('files')->insert([
                'name' => 'AssassinOfTheVoid_Gallery' . $i,
                'path' => File::generateSavedPath('Assassin Of The Void',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 7; $i++) {
            DB::table('files')->insert([
                'name' => 'AngelOfTheStars_Gallery' . $i,
                'path' => File::generateSavedPath('Angel Of The Stars',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 7; $i++) {
            DB::table('files')->insert([
                'name' => 'MedicOfTheGalaxy_Gallery' . $i,
                'path' => File::generateSavedPath('Medic Of The Galaxy',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 8; $i++) {
            DB::table('files')->insert([
                'name' => 'CreaturesOfWar_Gallery' . $i,
                'path' => File::generateSavedPath('Creatures Of War',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 4; $i++) {
            DB::table('files')->insert([
                'name' => 'TraitorsInTheBeginningOfTime_Gallery' . $i,
                'path' => File::generateSavedPath('Traitors In The Beginning Of Time',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 8; $i++) {
            DB::table('files')->insert([
                'name' => 'AndroidsInTheBeginningOfTime_Gallery' . $i,
                'path' => File::generateSavedPath('Androids In The Beginning Of Time',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 3; $i++) {
            DB::table('files')->insert([
                'name' => 'BeastsOfWar_Gallery' . $i,
                'path' => File::generateSavedPath('Beasts Of War',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 4; $i++) {
            DB::table('files')->insert([
                'name' => 'AssassinsAndFigures_Gallery' . $i,
                'path' => File::generateSavedPath('Assassins And Figures',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 7; $i++) {
            DB::table('files')->insert([
                'name' => 'HumansAndFriends_Gallery' . $i,
                'path' => File::generateSavedPath('Humans And Friends',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 7; $i++) {
            DB::table('files')->insert([
                'name' => 'BeastsAndCreators_Gallery' . $i,
                'path' => File::generateSavedPath('Beasts And Creators',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 6; $i++) {
            DB::table('files')->insert([
                'name' => 'SpiesAndRecruits_Gallery' . $i,
                'path' => File::generateSavedPath('Spies And Recruits',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 7; $i++) {
            DB::table('files')->insert([
                'name' => 'PlanetOfTheSun_Gallery' . $i,
                'path' => File::generateSavedPath('Planet Of The Sun',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 5; $i++) {
            DB::table('files')->insert([
                'name' => 'SignsOfAliens_Gallery' . $i,
                'path' => File::generateSavedPath('Signs Of Aliens',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 5; $i++) {
            DB::table('files')->insert([
                'name' => 'InfluenceOfOuterSpace_Gallery' . $i,
                'path' => File::generateSavedPath('Influence Of Outer Space',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 5; $i++) {
            DB::table('files')->insert([
                'name' => 'CarnageOfTheVacuum_Gallery' . $i,
                'path' => File::generateSavedPath('Carnage Of The Vacuum',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 7; $i++) {
            DB::table('files')->insert([
                'name' => 'DisguisedByMyPlanet_Gallery' . $i,
                'path' => File::generateSavedPath('Disguised By My Planet',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 8; $i++) {
            DB::table('files')->insert([
                'name' => 'AnxiousForTheDepths_Gallery' . $i,
                'path' => File::generateSavedPath('Anxious For The Depths',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 5; $i++) {
            DB::table('files')->insert([
                'name' => 'LifeWithTheSecrets_Gallery' . $i,
                'path' => File::generateSavedPath('Life With The Secrets',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
        for($i = 1; $i <= 7; $i++) {
            DB::table('files')->insert([
                'name' => 'FortuneOfTimeTravellers_Gallery' . $i,
                'path' => File::generateSavedPath('Fortune Of Time Travellers',File::GALLERY_PATH),
                'extension' => '.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
