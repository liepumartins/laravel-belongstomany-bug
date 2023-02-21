<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class BugTest extends TestCase
{

    public function testForcedLoad(): void
    {
        $user_id = 1;
        $user = User::findOrFail($user_id);
        $this->actingAs($user);
        $actualGroups = DB::table('group_user')->where('user_id', $user_id)->get();
        $properties = DB::table('item_properties')->whereIn('group_id', $actualGroups->pluck('group_id'))->count();
        $items = Item::with('forcedItemProperties')->get();
        $bugCount = $items->pluck('forcedItemProperties')->unique()->count();
        self::assertEquals($properties, $bugCount); // will fail anyway because pluck creates +1 additional empty item
    }

    public function testTheBug(): void
    {
        $user_id = 1;
        $user = User::findOrFail($user_id);
        $this->actingAs($user);
        $actualGroups = DB::table('group_user')->where('user_id', $user_id)->get();
        $properties = DB::table('item_properties')->whereIn('group_id', $actualGroups->pluck('group_id'))->count();
        $items = Item::with('itemProperties')->get();
        $bugCount = $items->pluck('itemProperties')->unique()->count();
        self::assertEquals($properties, $bugCount);
    }
}
