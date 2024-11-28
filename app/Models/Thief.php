<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thief extends Model
{
    /** @use HasFactory<\Database\Factories\ThiefFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
