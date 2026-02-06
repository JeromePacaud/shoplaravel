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
                // Électronique
                ['name' => 'iPhone 15 Pro', 'description' => 'Smartphone Apple dernière génération avec puce A17 Pro', 'price' => 1199.99],
                ['name' => 'Samsung Galaxy S24', 'description' => 'Smartphone Android haut de gamme avec caméra 200MP', 'price' => 999.99],
                ['name' => 'MacBook Air M3', 'description' => 'Ordinateur portable ultra-fin et puissant', 'price' => 1299.99],
                ['name' => 'iPad Pro 12.9"', 'description' => 'Tablette professionnelle avec écran Retina', 'price' => 1099.99],
                ['name' => 'AirPods Pro 2', 'description' => 'Écouteurs sans fil à réduction de bruit active', 'price' => 279.99],
                ['name' => 'Sony WH-1000XM5', 'description' => 'Casque audio premium avec réduction de bruit', 'price' => 399.99],

                // Vêtements
                ['name' => 'T-shirt Nike Dri-FIT', 'description' => 'T-shirt de sport respirant en polyester', 'price' => 29.99],
                ['name' => 'Jean Levi\'s 501', 'description' => 'Jean classique coupe droite en denim', 'price' => 89.99],
                ['name' => 'Veste North Face', 'description' => 'Veste imperméable pour randonnée', 'price' => 179.99],
                ['name' => 'Robe Zara', 'description' => 'Robe d\'été en coton léger', 'price' => 49.99],
                ['name' => 'Baskets Adidas Ultraboost', 'description' => 'Chaussures de running avec amorti Boost', 'price' => 149.99],
                ['name' => 'Pull H&M', 'description' => 'Pull en laine mérinos doux', 'price' => 39.99],

                // Maison & Jardin
                ['name' => 'Canapé 3 places IKEA', 'description' => 'Canapé convertible en tissu gris', 'price' => 599.99],
                ['name' => 'Table à manger', 'description' => 'Table en bois massif pour 6 personnes', 'price' => 399.99],
                ['name' => 'Lampe de bureau LED', 'description' => 'Lampe réglable avec port USB', 'price' => 45.99],
                ['name' => 'Tondeuse Bosch', 'description' => 'Tondeuse électrique 1400W', 'price' => 129.99],
                ['name' => 'Set de couteaux', 'description' => 'Ensemble 5 couteaux professionnels', 'price' => 79.99],
                ['name' => 'Aspirateur Dyson', 'description' => 'Aspirateur sans fil V15 puissant', 'price' => 599.99],

                // Sports & Loisirs
                ['name' => 'Ballon de football Adidas', 'description' => 'Ballon officiel taille 5', 'price' => 24.99],
                ['name' => 'Raquette de tennis Wilson', 'description' => 'Raquette professionnelle 300g', 'price' => 179.99],
                ['name' => 'Tapis de yoga', 'description' => 'Tapis antidérapant 6mm épaisseur', 'price' => 34.99],
                ['name' => 'Vélo VTT', 'description' => 'VTT 27.5 pouces 21 vitesses', 'price' => 449.99],
                ['name' => 'Haltères 10kg', 'description' => 'Paire d\'haltères réglables', 'price' => 89.99],
                ['name' => 'Sac de sport Nike', 'description' => 'Sac de sport grande capacité 60L', 'price' => 54.99],

                // Beauté & Santé
                ['name' => 'Shampoing L\'Oréal', 'description' => 'Shampoing réparateur pour cheveux abîmés', 'price' => 12.99],
                ['name' => 'Crème visage Nivea', 'description' => 'Crème hydratante anti-âge 50ml', 'price' => 18.99],
                ['name' => 'Parfum Dior Sauvage', 'description' => 'Eau de toilette homme 100ml', 'price' => 119.99],
                ['name' => 'Brosse à dents électrique', 'description' => 'Oral-B avec capteur de pression', 'price' => 89.99],
                ['name' => 'Vitamines multiples', 'description' => 'Complément alimentaire 90 gélules', 'price' => 24.99],
                ['name' => 'Sèche-cheveux Dyson', 'description' => 'Sèche-cheveux professionnel ionique', 'price' => 399.99]
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
        $product = $this->getRealisticProductData();

        return [
            'name' => $product['name'],
            'slug' => Str::slug($product['name'] . '-' . $this->faker->unique()->numberBetween(1, 10000)),
            'description' => $product['description'],
            'price' => $product['price'],
            'stock' => $this->faker->numberBetween(0, 100),
            'active' => $this->faker->boolean(85), // 85% actifs
            'category_id' => Category::factory(),
        ];
    }
}
