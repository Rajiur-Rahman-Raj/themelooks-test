<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'product_variants';
    protected $guarded = ['id'];

    protected $casts = [
        'variants' => 'array'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function getShowProductVariantDiscountPriceAttribute()
    {
        $sellingPrice = $this->selling_price;
        $discount = $this->product->discount;
        return $sellingPrice - ($sellingPrice * ($discount / 100));
    }

    public function getShowProductVariantDiscountAmountAttribute()
    {
        $sellingPrice = $this->selling_price;
        $discount = $this->product->discount;
        return ($sellingPrice * $discount) / 100;
    }

    public function getShowProductVariantTaxAmountAttribute()
    {
        $sellingPrice = $this->selling_price;
        $tax = $this->product->tax;
        return number_format(($sellingPrice * $tax) / 100);
    }
}
