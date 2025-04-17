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
        'description',
        'price',
        'quantity',
        'image',
        'rating',
        'reviews_count',
        'is_featured',
        'status',
        'category_id',
        'brand_id',
    ];

    // Một Product thuộc về một Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Một Product thuộc về một Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
