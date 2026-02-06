<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('categories')->insert([
            [
                'name' => 'Électronique',
                'slug' => 'electronique',
                'description' => 'Smartphones, ordinateurs, tablettes et accessoires high-tech',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vêtements',
                'slug' => 'vetements',
                'description' => 'Mode homme, femme et enfant : t-shirts, pantalons, robes et accessoires',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maison & Déco',
                'slug' => 'maison-deco',
                'description' => 'Meubles, luminaires, décoration intérieure et articles pour la maison',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sports & Loisirs',
                'slug' => 'sports-loisirs',
                'description' => 'Équipements sportifs, vêtements de sport et accessoires outdoor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Livres & Médias',
                'slug' => 'livres-medias',
                'description' => 'Romans, BD, magazines, films et musique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
