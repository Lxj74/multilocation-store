<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'apple',
                'description' => 'apple description..',
                'code' => 'apple',
                'total' => 100
            ],
            [
                'name' => 'banana',
                'description' => 'banana description..',
                'code' => 'banana',
                'total' => 300
            ],
            [
                'name' => 'pine-apple',
                'description' => 'pine-apple description..',
                'code' => 'p-apple',
                'total' => 40
            ],
            [
                'name' => 'orange',
                'description' => 'orange description..',
                'code' => 'orange',
                'total' => 78
            ]
        ];

        foreach ($products as $product){
            Product::create($product);
        }


    }
}
