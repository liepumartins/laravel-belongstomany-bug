<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Log;

final class ItemProperty extends Model
{

    public static function scopeForUser(Builder $builder): void
    {
        $user = auth()->user();
        if ($user) {
            $builder->whereIn('group_id', $user->groups->pluck('id'));
            // will display number of records in group_user table
            //dd($user->groups);
            Log::debug($user->groups);
        }
    }

    public static function scopeForcedUser(Builder $builder): void
    {
        $user = auth()->user();
        if ($user) {
            $builder->whereIn('group_id', $user->load('groups')->groups->pluck('id'));
            // will display correct number of records that actually belong to user
            //dd($user->groups);
            Log::debug($user->groups);
        }
    }
}
