<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function people()
    {
        return $this->belongsToMany(Person::class, 'category_person');
    }

    public function tierLists()
    {
        return $this->hasMany(TierList::class);
    }
}
