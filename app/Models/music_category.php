<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class music_category extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class, "category_music");
    }
}
