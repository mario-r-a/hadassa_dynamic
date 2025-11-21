<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    /**
     * Allow assignment for qty/quantity compatibility and price snapshot.
     */
    protected $fillable = [
        'cart_id',
        'product_id',
        'qty',
        'quantity', // accepted for compatibility with existing code
        'price',
    ];

    /**
     * Relationship to Cart
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Relationship to Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Accessor: $item->quantity reads underlying 'qty' column (or 'quantity' if present).
     */
    public function getQuantityAttribute()
    {
        if (array_key_exists('qty', $this->attributes)) {
            return (int) $this->attributes['qty'];
        }

        if (array_key_exists('quantity', $this->attributes)) {
            return (int) $this->attributes['quantity'];
        }

        return null;
    }

    /**
     * Mutator: assigning to $item->quantity writes to 'qty' column.
     */
    public function setQuantityAttribute($value)
    {
        $this->attributes['qty'] = (int) $value;
    }
}