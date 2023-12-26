<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [             // khai báo các trường trong bảng ở database vào Model
        'name',
        'thumb',
        'active'
    ];
}
