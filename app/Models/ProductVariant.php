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
        'variants' => 'json'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}