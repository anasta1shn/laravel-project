<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

/**
 * @mixin Builder;
 */

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'image', 'description', 'weight', 'price', 'category_id'];

    public function getImageAttribute() {
        if (!$this->attributes['image']) {
            return '/img/products/no_image.jpg';
        }

        return Storage::url($this->attributes['image']);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getTotalPrice() {
        if (!is_null($this->pivot->quantity)) {
            return $this->pivot->quantity * $this->price;
        }

        return $this->price;
    }
}
