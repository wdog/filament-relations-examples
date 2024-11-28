<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;


    protected $fillable = [
        'name',
        'thief_id',
    ];

    public function thief()
    {
        return $this->belongsTo(Thief::class);
    }
}
