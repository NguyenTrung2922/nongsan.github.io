<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_Products extends Model
{
    use HasFactory;
    protected $table = 'image_products';

    protected $fillable = [
        'name',
        'product_id',

    ];

    public function imageproduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
