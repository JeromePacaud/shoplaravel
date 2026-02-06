<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            [
                'name' => 'Électronique',
                'description' => 'Smartphones, ordinateurs, tablettes et accessoires tech'
            ],
            [
                'name' => 'Vêtements',
                'description' => 'Mode homme, femme et enfant - Toutes les tendances'
            ],
            [
                'name' => 'Maison & Jardin',
                'description' => 'Meubles, décoration, jardinage et bricolage'
            ],
            [
                'name' => 'Sports & Loisirs',
                'description' => 'Équipement sportif, fitness et activités de plein air'
            ],
            [
                'name' => 'Beauté & Santé',
                'description' => 'Cosmétiques, soins du corps et bien-être'
            ],
        ];

        $category = $this->faker->unique()->randomElement($categories);

        return [
            'name' => $category['name'],
            'slug' => Str::slug($category['name']),
            'description' => $category['description'],
        ];
    }
}
