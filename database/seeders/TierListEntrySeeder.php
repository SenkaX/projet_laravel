<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TierList;
use App\Models\Person;
use App\Models\Category;
use App\Models\TierListEntry;

class TierListEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TierListEntry::truncate();
        $alois = Person::where('name', 'ALOIS')->first();
        $tierLists = TierList::all();
        foreach ($tierLists as $tierList) {
            $category = $tierList->category;
            $people = $category->people()->where('name', '!=', 'ALOIS')->get();
            // Alois en top 1
            TierListEntry::create([
                'tier_list_id' => $tierList->id,
                'person_id' => $alois->id,
                'position' => 1,
            ]);
            $pos = 2;
            foreach ($people as $person) {
                TierListEntry::create([
                    'tier_list_id' => $tierList->id,
                    'person_id' => $person->id,
                    'position' => $pos++, // incrémentation de la position
                ]);
            }
        }
    }
}
