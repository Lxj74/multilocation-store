<?php
namespace App\Services;

use App\Models\Location;

class LocationService
{
    public function getData(){
        $locations = Location::all();

        return $locations;
    }

    public function getCount(){

        return Location::all()->count();
    }
}
