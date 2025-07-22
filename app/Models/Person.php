<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // Relation avec les votes
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    // Score total (somme des votes)
    public function score()
    {
        return $this->votes()->sum('value');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'person_tag');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_person');
    }

    public function tierListEntries()
    {
        return $this->hasMany(TierListEntry::class);
    }
}