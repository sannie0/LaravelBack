<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use mysql_xdevapi\Table;

class Category_Product extends Model
{
    use HasFactory;
    protected $table = "category_products";
    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'category_id', 'id');
    }
}
