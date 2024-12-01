<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function drivers(): BelongsToMany
    {
        return $this->belongsToMany(Driver::class, 'car_driver')
            ->withPivot(['id'])
            ->withTimestamps();
    }
}
