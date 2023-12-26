<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [             // khai báo các trường trong bảng ở database vào Model
        'name',
        'phone',
        'address',
        'email',
        'province',
        'status'

    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'customer_id', 'id'); // quan hệ 1 nhiều 1 menu có nhiều sản phẩm khóa ngoại :menu_id bảng Product khóa chính id bảng Menu
    }
}
