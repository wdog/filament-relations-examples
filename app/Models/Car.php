<?php

// ! RELATION 1-1
// Business Rules:
// The Owner can own one Car.
// The Car can be owned by one Owner. 
// ! The Cars table should store the Owner ID. 
// $owner->car()->save($car);
// $car->owner()->associate($owner)->save();

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'model',
        'owner_id'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }


    public function scopeUnassigned(Builder $query)
    {
        return $query->whereNull('owner_id');
    }
}
