<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    /** @use HasFactory<\Database\Factories\ProductPhotoFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_path'
    ];

    // Relation ke Product (many-to-one)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
