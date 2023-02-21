<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = DB::table('items')->count();
        $groups = DB::table('groups')->count();
        $total = $items * $groups / 2;
        for ($i = $total; $i > 0; $i--) {
            DB::table('item_properties')->insertOrIgnore([
                'item_id' => DB::table('items')->select('id')->inRandomOrder()->first()->id,
                'group_id' => DB::table('groups')->select('id')->inRandomOrder()->first()->id,
            ]);
        }
    }
}
