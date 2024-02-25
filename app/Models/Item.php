<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category_Product::class, 'category_id', 'id');
    }
    public function order(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_item');
    }
}
