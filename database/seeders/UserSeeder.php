<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = DB::table('users')->insertGetId([
            'name' => 'testy',
            'email' => 'nonexisting@something.unreal',
            'password' => Hash::make('password'),
        ]);
        DB::table('group_user')->insert([
            'user_id' => $id,
            'group_id' => DB::table('groups')->select('id')->inRandomOrder()->first()->id,
        ]);
        for ($i = 10; $i>0; $i--) {
            $id = DB::table('users')->insertGetId([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
            ]);
            DB::table('group_user')->insert([
                'user_id' => $id,
                'group_id' => DB::table('groups')->select('id')->inRandomOrder()->first()->id,
            ]);
        }
    }
}
