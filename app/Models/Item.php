<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    public function itemProperties(): HasMany
    {
        return $this->hasMany(ItemProperty::class)->scopes('forUser');
    }

    public function forcedItemProperties(): HasMany
    {
        return $this->hasMany(ItemProperty::class)->scopes('forcedUser');
    }
}
