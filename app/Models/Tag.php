<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function people()
    {
        return $this->belongsToMany(Person::class, 'person_tag');
    }
}
