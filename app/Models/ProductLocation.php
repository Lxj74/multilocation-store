<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLocation extends Model
{
    protected $table = 'product_locations';

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function locations()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
