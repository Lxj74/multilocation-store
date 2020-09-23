<?php

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
                [
                    'name' => 'bedroom',
                    'description' => 'bedroom description..',
                    'code' => 'bedroom',
                ],
                [
                    'name' => 'kitchen',
                    'description' => 'kitchen description..',
                    'code' => 'kitchen',
                ],
                [
                    'name' => 'living-room',
                    'description' => 'living-room description..',
                    'code' => 'living-room',
                ]
            ];

        foreach ($locations as $location){
            Location::create($location);
        }
    }
}
