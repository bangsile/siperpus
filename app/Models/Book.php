<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasUuids;

    protected $fillable = ['code', 'title', 'author', 'publisher', 'year', 'stock', 'category_id'];
}
