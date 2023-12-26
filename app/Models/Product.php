<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'SKU',
        'price',
        'content',
        'slug',
        'category_id',
        'active',

    ];



    public function imgPro()
    {
        return $this->hasMany(Image_Products::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
