<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'id_user',
        'id_product',
        'soluong',
    ];

    public $timestamps = false;

    // Không sử dụng cột id làm khóa chính
    protected $primaryKey = null;
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}

