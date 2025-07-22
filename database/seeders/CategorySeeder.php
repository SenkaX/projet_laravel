<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'politique', 'description' => null, 'children' => [
                ['name' => 'droite', 'description' => 'salma'],
                ['name' => 'gauche', 'description' => null],
                ['name' => 'centre', 'description' => null],
                ['name' => 'communistes', 'description' => null],
            ]],
            ['name' => 'écologique', 'description' => null, 'children' => [
                ['name' => 'écoterrorisme', 'description' => 'idris'],
            ]],
            ['name' => 'féministe', 'description' => null, 'children' => [
                ['name' => 'Féminine Universelle', 'description' => null],
                ['name' => 'gynocentrisme', 'description' => 'momo'],
            ]],
            ['name' => 'masculiniste', 'description' => null, 'children' => [
                ['name' => 'MRA', 'description' => 'lucas'],
                ['name' => 'anti-féminisme', 'description' => null],
            ]],
            ['name' => 'religion', 'description' => null, 'children' => [
                ['name' => 'fondamentalisme chrétien', 'description' => null],
                ['name' => 'islamisme', 'description' => 'yass'],
                ['name' => 'sionisme extrême', 'description' => 'SABINE'],
                ['name' => 'anti-religieux extrême', 'description' => null],
            ]],
            ['name' => 'lbgtqia+', 'description' => null, 'children' => [
                ['name' => 'queer radical', 'description' => 'max'],
                ['name' => 'TERF', 'description' => null],
            ]],
            ['name' => 'complotisme', 'description' => null, 'children' => [
                ['name' => 'anti-vax', 'description' => 'raph'],
                ['name' => 'illuminati', 'description' => 'noah'],
                ['name' => 'terre plate', 'description' => 'maki'],
                ['name' => 'grand remplacement', 'description' => 'dédé'],
            ]],
        ];

        foreach ($categories as $cat) {
            $parent = Category::create([
                'name' => $cat['name'],
                'description' => $cat['description'] ?? null,
                'parent_id' => null,
            ]);
            if (!empty($cat['children'])) {
                foreach ($cat['children'] as $child) {
                    Category::create([
                        'name' => $child['name'],
                        'description' => $child['description'] ?? null,
                        'parent_id' => $parent->id,
                    ]);
                }
            }
        }
        // Lier les personnes aux catégories correspondantes
        // On suppose que les personnes et catégories existent déjà
        $personMap = [
            'ALOIS' => 'ALOIS',
            'salma' => 'droite',
            'idris' => 'écoterrorisme',
            'momo' => 'gynocentrisme',
            'lucas' => 'MRA',
            'yass' => 'islamisme',
            'SABINE' => 'sionisme extrême',
            'max' => 'queer radical',
            'raph' => 'anti-vax',
            'noah' => 'illuminati',
            'maki' => 'terre plate',
            'dédé' => 'grand remplacement',
            // Nouvelles personnes
            'julien' => 'gauche',
            'emma' => 'centre',
            'paul' => 'communistes',
            'claire' => 'Féminine Universelle',
            'ines' => 'anti-féminisme',
            'thomas' => 'fondamentalisme chrétien',
            'sarah' => 'anti-religieux extrême',
            'leo' => 'TERF',
            'marc' => 'MRA',
            'lina' => 'lbgtqia+',
            'simon' => 'complotisme',
            'eva' => 'écologique',
            // Uniques pour chaque catégorie principale
            'pol1' => 'politique',
            'eco1' => 'écologique',
            'fem1' => 'féministe',
            'masc1' => 'masculiniste',
            'rel1' => 'religion',
            'lgbt1' => 'lbgtqia+',
            'comp1' => 'complotisme',
        ];
        foreach ($personMap as $personName => $categoryName) {
            $person = \App\Models\Person::where('name', $personName)->first();
            $category = \App\Models\Category::where('name', $categoryName)->first();
            if ($person && $category) {
                $category->people()->syncWithoutDetaching([$person->id]);
            }
        }
        // Mettre Alois dans toutes les catégories
        $alois = \App\Models\Person::where('name', 'ALOIS')->first();
        if ($alois) {
            foreach (\App\Models\Category::all() as $cat) {
                $cat->people()->syncWithoutDetaching([$alois->id]);
            }
        }
    }
}
