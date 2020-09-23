<?php

use Illuminate\Database\Seeder;

use App\Models\ProductLocation;

class ProductLocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productLocations = [
          [
              'product_id' => 1,
              'location_id' => 1,
              'quantity' => 5
          ]  ,
            [
                'product_id' => 1,
                'location_id' => 2,
                'quantity' => 5
            ],
            [
                'product_id' => 1,
                'location_id' => 3,
                'quantity' => 5
            ],
            [
                'product_id' => 2,
                'location_id' => 1,
                'quantity' => 5
            ],
            [
                'product_id' => 2,
                'location_id' => 2,
                'quantity' => 5
            ],
            [
                'product_id' => 3,
                'location_id' => 2,
                'quantity' => 5
            ]
        ];

        foreach ($productLocations as $productLocation){
            ProductLocation::create($productLocation);
        }
    }
}
