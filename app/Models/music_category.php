<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class music_category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $table = "category_music";

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
