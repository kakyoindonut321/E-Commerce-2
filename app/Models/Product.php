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
            $query->where('category_id', 'like', request('category'));
        }

        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%');
            // ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }

    public function scopeCategoryCount()
    {
        $category = Category::get();
        $countCat = count($category);
        $catlist = [];
        foreach ($category as $ccc) {
            $catcount = count($this->where('category_id', $ccc->id)->get());
            $catlist = array_merge($catlist, [$ccc->category => $catcount]);
        }

        // $CategoryCount = array_count_values($category);
        return collect([
            "categorycount" => $countCat,
            "categoryname" => $catlist
        ])->toJson();
    }


    public function scopeProductTotal()
    {
        $totalProduct = $this->oldest()->get();

        $Product = count($totalProduct);

        return $Product;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;

}
