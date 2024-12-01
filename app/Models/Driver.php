<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Driver extends Model
{
    /** @use HasFactory<\Database\Factories\DriverFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class, 'car_driver')
            ->withPivot(['id'])
            ->withTimestamps();
    }
}
