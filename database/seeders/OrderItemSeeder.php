<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('order_items')->insert([
            // Commande #1 (Jean Dupont - 1508.00€)
            [
                'order_id' => 1,
                'product_id' => 1, // iPhone 15 Pro
                'quantity' => 1,
                'unit_price' => 1229.00,
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'order_id' => 1,
                'product_id' => 3, // AirPods Pro 2
                'quantity' => 1,
                'unit_price' => 279.00,
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],

            // Commande #2 (Marie Martin - 279.00€)
            [
                'order_id' => 2,
                'product_id' => 3, // AirPods Pro 2
                'quantity' => 1,
                'unit_price' => 279.00,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],

            // Commande #3 (Jean Dupont - 74.98€)
            [
                'order_id' => 3,
                'product_id' => 5, // T-shirt Code & Coffee
                'quantity' => 2,
                'unit_price' => 24.99,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'order_id' => 3,
                'product_id' => 6, // Sweat Dev Mode
                'quantity' => 1,
                'unit_price' => 49.99,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],

            // Commande #4 (Pierre Durand - 639.00€)
            [
                'order_id' => 4,
                'product_id' => 9, // Lampe LED
                'quantity' => 1,
                'unit_price' => 39.99,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'order_id' => 4,
                'product_id' => 11, // Bureau réglable
                'quantity' => 1,
                'unit_price' => 599.00,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],

            // Commande #5 (Sophie Bernard - 184.98€)
            [
                'order_id' => 5,
                'product_id' => 12, // Tapis yoga
                'quantity' => 2,
                'unit_price' => 34.99,
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(15),
            ],
            [
                'order_id' => 5,
                'product_id' => 15, // Livre Laravel
                'quantity' => 1,
                'unit_price' => 39.99,
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(15),
            ],
            [
                'order_id' => 5,
                'product_id' => 16, // Clean Code
                'quantity' => 2,
                'unit_price' => 44.99,
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(15),
            ],
        ]);
    }
}
