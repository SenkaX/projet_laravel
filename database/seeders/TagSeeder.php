<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'populaire'],
            ['name' => 'jeune'],
            ['name' => 'vieux'],
            ['name' => 'controversé'],
            ['name' => 'extrême'],
        ];
        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
