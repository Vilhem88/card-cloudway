<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products =
         [
            [
                'name' => 'Apple Mackbook Pro 16',
                'details' => 'Apple M1 Pro, 16 GPU, 16GB, 512GB SSD',
                'description' => 'Supercharged by M2 Pro or M2 Max, MacBook Pro takes its power and efficiency further than ever. It delivers exceptional performance whether it’s plugged in or not, and now has even longer battery life. Combined with a stunning Liquid Retina XDR display and all the ports you need — this is a pro laptop without equal.',
                'brand' => 'Apple',
                'price' => 1999,
                'shipping_cost' => 25,
                'image_path' => 'storage/product_one.jpg'

            ],
            [
                'name' => 'Apple iPad Pro',
                'details' => 'iPad Pro 11‑inch, 256GB',
                'description' => 'Astonishing performance. Incredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS 16. The ultimate iPad experience.',
                'brand' => 'Apple',
                'price' => 799,
                'shipping_cost' => 25,
                'image_path' => 'storage/product_two.jpg'

            ],
        ];
        
        foreach($products as $key => $value){
            Product::create($value);
        }
    }
}
