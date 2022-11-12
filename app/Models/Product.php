<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['name', 'image', 'description', 'stock'];

    public function scopeFilter($query, array $filters)
    {
        if($filters['category'] ?? false) {
            $query->where('category', 'like', '%' . request('category') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;

}
