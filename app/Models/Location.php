<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    protected $table = 'locations';
    protected $fillable =['name', 'description', 'code'];

    public function productLocations()
    {
        return $this->hasMany(ProductLocation::class);
    }
}
