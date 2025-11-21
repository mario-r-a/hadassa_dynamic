<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'main_image',
        'price'
    ];
    

    // Relation ke Category (many-to-one)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relation ke ProductPhoto (one-to-many)
    public function productPhotos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
