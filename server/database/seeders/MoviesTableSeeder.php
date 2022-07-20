<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::factory()->create([
            'title' => 'Defender Of The Sun',
            'status_id' => Status::APPROVED_ID,
            'approver_id' => 1
        ]);
        Movie::factory()->create([
            'title' => 'Assassin Of The Void',
            'status_id' => Status::APPROVED_ID,
            'approver_id' => 1
        ]);
        Movie::factory()->create([
            'title' => 'Angel Of The Stars',
            'status_id' => Status::APPROVED_ID,
            'approver_id' => 1
        ]);
        Movie::factory()->create([
            'title' => 'Medic Of The Galaxy',
        ]);
        Movie::factory()->create([
            'title' => 'Creatures Of War',
            'status_id' => Status::PUBLISHED_ID,
        ]);
        Movie::factory()->create([
            'title' => 'Traitors In The Beginning Of Time',
        ]);
        Movie::factory()->create([
            'title' => 'Androids In The Beginning Of Time',
            'status_id' => Status::PUBLISHED_ID,
        ]);
        Movie::factory()->create([
            'title' => 'Beasts Of War',
            'status_id' => Status::PUBLISHED_ID,
        ]);
        Movie::factory()->create([
            'title' => 'Assassins And Figures',
        ]);
        Movie::factory()->create([
            'title' => 'Humans And Friends',
            'status_id' => Status::APPROVED_ID,
            'approver_id' => 1
        ]);
        Movie::factory()->create([
            'title' => 'Beasts And Creators',
            'status_id' => Status::APPROVED_ID,
            'approver_id' => 1
        ]);
        Movie::factory()->create([
            'title' => 'Spies And Recruits',
            'status_id' => Status::APPROVED_ID,
            'approver_id' => 1
        ]);
        Movie::factory()->create([
            'title' => 'Planet Of The Sun',
        ]);
        Movie::factory()->create([
            'title' => 'Signs Of Aliens',
            'status_id' => Status::PUBLISHED_ID,
        ]);
        Movie::factory()->create([
            'title' => 'Influence Of Outer Space',
        ]);
        Movie::factory()->create([
            'title' => 'Carnage Of The Vacuum',
        ]);
        Movie::factory()->create([
            'title' => 'Disguised By My Planet',
        ]);
        Movie::factory()->create([
            'title' => 'Anxious For The Depths',
            'status_id' => Status::APPROVED_ID,
            'approver_id' => 1
        ]);
        Movie::factory()->create([
            'title' => 'Life With The Secrets',
            'status_id' => Status::APPROVED_ID,
            'approver_id' => 1
        ]);
        Movie::factory()->create([
            'title' => 'Fortune Of Time Travellers',
            'status_id' => Status::APPROVED_ID,
            'approver_id' => 1
        ]);
    }
}
