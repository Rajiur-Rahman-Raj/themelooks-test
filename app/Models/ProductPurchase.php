<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'product_purchases';

    protected $casts = [
      'purchase_details' => 'array',
    ];
}
