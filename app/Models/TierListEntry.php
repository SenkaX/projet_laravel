<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TierListEntry extends Model
{
    public function tierList()
    {
        return $this->belongsTo(TierList::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
