<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(Buyer::class);
    }
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'order_item')->withPivot(['quantity', 'price']);
    }
}
