<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'email' => 'MainAdmin@admin.com',
            'password' => bcrypt("_Admin123", [
                'rounds' => 7,
            ]),
            'role_id' => Role::ADMIN_ID,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'email' => 'MrModerator1@moder.com',
            'password' => bcrypt("_User123", [
                'rounds' => 7,
            ]),
            'role_id' => Role::MODER_ID,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'email' => 'MsModerka@yandex.ru',
            'password' => bcrypt("_123User", [
                'rounds' => 7,
            ]),
            'role_id' => Role::MODER_ID,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'email' => 'SerModer@gov.gov',
            'password' => bcrypt("123_User", [
                'rounds' => 7,
            ]),
            'role_id' => Role::MODER_ID,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
