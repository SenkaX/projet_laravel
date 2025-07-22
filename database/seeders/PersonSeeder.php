<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Person;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $people = [
            ['name' => 'ALOIS', 'description' => 'Toujours top 1 dans toutes les catégories'],
            ['name' => 'salma', 'description' => 'droite'],
            ['name' => 'idris', 'description' => 'écoterrorisme'],
            ['name' => 'momo', 'description' => 'gynocentrisme'],
            ['name' => 'lucas', 'description' => 'MRA'],
            ['name' => 'yass', 'description' => 'islamisme'],
            ['name' => 'SABINE', 'description' => 'sionisme extrême'],
            ['name' => 'max', 'description' => 'queer radical'],
            ['name' => 'raph', 'description' => 'anti-vax'],
            ['name' => 'noah', 'description' => 'illuminati'],
            ['name' => 'maki', 'description' => 'terre plate'],
            ['name' => 'dédé', 'description' => 'grand remplacement'],
            // Ajouts pour chaque catégorie et sous-catégorie
            ['name' => 'julien', 'description' => 'gauche'],
            ['name' => 'emma', 'description' => 'centre'],
            ['name' => 'paul', 'description' => 'communistes'],
            ['name' => 'claire', 'description' => 'Féminine Universelle'],
            ['name' => 'ines', 'description' => 'anti-féminisme'],
            ['name' => 'thomas', 'description' => 'fondamentalisme chrétien'],
            ['name' => 'sarah', 'description' => 'anti-religieux extrême'],
            ['name' => 'leo', 'description' => 'TERF'],
            ['name' => 'marc', 'description' => 'masculiniste'],
            ['name' => 'lina', 'description' => 'lbgtqia+'],
            ['name' => 'simon', 'description' => 'complotisme'],
            ['name' => 'eva', 'description' => 'écologique'],
            // Uniques pour chaque catégorie principale
            ['name' => 'pol1', 'description' => 'politique'],
            ['name' => 'eco1', 'description' => 'écologique'],
            ['name' => 'fem1', 'description' => 'féministe'],
            ['name' => 'masc1', 'description' => 'masculiniste'],
            ['name' => 'rel1', 'description' => 'religion'],
            ['name' => 'lgbt1', 'description' => 'lbgtqia+'],
            ['name' => 'comp1', 'description' => 'complotisme'],
        ];
        foreach ($people as $p) {
            \App\Models\Person::firstOrCreate(['name' => $p['name']], $p);
        }
    }
}
