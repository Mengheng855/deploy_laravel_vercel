<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'pro_name' => 'Laptop Pro',
                'price' => 1200.00,
                'qty' => 10,
                'category' => 'Electronics',
                'image' => 'products/laptop.png',
            ],
            [
                'pro_name' => 'Smartphone X',
                'price' => 899.99,
                'qty' => 25,
                'category' => 'Electronics',
                'image' => 'products/smartphone.png',
            ],
            [
                'pro_name' => 'Ergonomic Chair',
                'price' => 150.50,
                'qty' => 50,
                'category' => 'Furniture',
                'image' => 'products/chair.png',
            ],
            [
                'pro_name' => 'Mechanical Keyboard',
                'price' => 95.00,
                'qty' => 100,
                'category' => 'Accessories',
                'image' => 'products/keyboard.png',
            ],
            [
                'pro_name' => 'Wireless Mouse',
                'price' => 45.00,
                'qty' => 200,
                'category' => 'Accessories',
                'image' => 'products/mouse.png',
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
