<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'user_id' => 2, // Jean Dupont
                'total' => 1508.00,
                'status' => 'delivered',
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(7),
            ],
            [
                'user_id' => 3, // Marie Martin
                'total' => 279.00,
                'status' => 'shipped',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(3),
            ],
            [
                'user_id' => 2, // Jean Dupont
                'total' => 74.98,
                'status' => 'paid',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'user_id' => 4, // Pierre Durand
                'total' => 639.00,
                'status' => 'pending',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'user_id' => 5, // Sophie Bernard
                'total' => 184.98,
                'status' => 'delivered',
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(12),
            ],
        ]);
    }
}
