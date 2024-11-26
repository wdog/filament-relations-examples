<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['item_name'];

    public function child_items(): BelongsToMany
    {
        return $this->BelongsToMany(
            Item::class,
            'item_item',
            'parent_item_id',
            'item_id'
        )->withTimestamps();
    }


    public function parent_item(): BelongsToMany
    {
        return $this->BelongsToMany(
            Item::class,
            'item_item',
            'item_id',
            'parent_item_id'
        )->withTimestamps();
    }
}
