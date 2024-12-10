<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'sku',
        'unit_quantity',
        'unit_value',
        'discount',
        'tax',
        'image',
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function getShowProductDiscountAttribute()
    {
        return $this->discount > 0
            ? '-' . number_format($this->discount) . '%'
            : null;
    }

    public function getShowProductDiscountPriceAttribute()
    {
        $sellingPrice = $this->selling_price;
        $discount = $this->discount;
        return number_format($sellingPrice - ($sellingPrice * ($discount / 100)));
    }


}
