<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'license_plate',
        'rental_rate',
        'available',
    ];

    /**
     * Get the rentals for the car.
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
