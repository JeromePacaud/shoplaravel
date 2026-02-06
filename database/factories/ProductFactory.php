<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\CategoryFactory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    private function getRealisticProductData(): array
    {
        $productsData = [
            ['name' => 'iPhone 15 Pro', 'description' => 'Smartphone Apple dernière génération', 'price' => 1199.99],
            ['name' => 'Samsung Galaxy S24', 'description' => 'Smartphone Android haut de gamme', 'price' => 999.99],
            ['name' => 'MacBook Air M2', 'description' => 'Ordinateur portable ultra-fin', 'price' => 1299.99],
            ['name' => 'AirPods Pro', 'description' => 'Écouteurs sans fil à réduction de bruit', 'price' => 279.99],
            ['name' => 'T-shirt Nike', 'description' => 'T-shirt de sport en coton respirant', 'price' => 29.99],
            ['name' => 'Jean Levi\'s 501', 'description' => 'Jean classique coupe droite', 'price' => 89.99],
            ['name' => 'Chaussures Adidas', 'description' => 'Baskets de running confortables', 'price' => 119.99],
            ['name' => 'Canapé 3 places', 'description' => 'Canapé en tissu gris moderne', 'price' => 599.99],
            ['name' => 'Lampe de bureau LED', 'description' => 'Lampe réglable avec port USB', 'price' => 45.99],
            ['name' => 'Ballon de football', 'description' => 'Ballon officiel taille 5', 'price' => 24.99],
        ];

        return $this->faker->randomElement($productsData);
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = ucfirst($this->faker->unique()->word(3, true));

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'stock' => $this->faker->numberBetween(0, 100),
            'active' => $this->faker->boolean(),
            'category_id' => Category::factory(),
        ];
    }
}
