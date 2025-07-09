<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasUuids;

    protected $fillable = ['code', 'name', 'shelf_id'];

    public function books()
    {
        $this->hasMany(Book::class);
    }
}
