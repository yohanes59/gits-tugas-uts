<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

	protected $fillable = ['product_id', 'name', 'category_id', 'price','image'];

	public function category()
	{
		return $this->belongsTo(Category::class, 'category_id');
	}
}
