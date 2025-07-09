<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasUuids;

    protected $fillable = ['code', 'title', 'author', 'publisher', 'year', 'stock', 'category_id'];

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('title', 'like', '%' . $term . '%')
                ->orWhere('author', 'like', '%' . $term . '%')
                ->orWhere('code', '=', $term );
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}