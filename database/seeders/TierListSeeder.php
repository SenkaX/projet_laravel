<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TierList;
use App\Models\User;
use App\Models\Category;

class TierListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $categories = Category::whereNull('parent_id')->get();
        foreach ($categories as $cat) {
            TierList::create([
                'user_id' => $user->id,
                'category_id' => $cat->id,
                'name' => 'Classement ' . $cat->name,
                'description' => 'Tier list de démonstration pour la catégorie ' . $cat->name,
            ]);
        }
    }
}
