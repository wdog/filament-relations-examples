<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['item_name'];

    // public function childItems(): HasMany
    // {
    //     return $this->hasMany(Item::class, 'item_id', 'id');
    // }


    // public function parentItem(): BelongsTo
    // {
    //     return $this->belongsTo(Item::class, 'item_id', 'id');
    // }
}
