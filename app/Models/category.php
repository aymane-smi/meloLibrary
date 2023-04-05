<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = "category";

    protected $guarded = [];

    public function songs(){
        return $this->belongsToMany(music::class, "category_music", 'music_id', 'category_id');
    }
}
