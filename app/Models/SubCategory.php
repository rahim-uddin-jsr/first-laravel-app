<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['is_active', 'category_id', 'slug', 'name'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
