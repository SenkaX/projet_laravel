<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TierList extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function entries()
    {
        return $this->hasMany(TierListEntry::class);
    }
}
