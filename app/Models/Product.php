<?php

namespace App\Models;

use App\Models\DetailTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function detailtransaction()
    {
        return $this->hasMany(DetailTransaction::class, 'product_id');
    }
}
