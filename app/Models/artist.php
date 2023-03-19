<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artist extends Model
{
    use HasFactory;

    //protected $fillable = ["name", "birthday", "country", "artist_image"];

    protected $guarded = [];

    protected $table = "artist";

    public function bands()
    {
        return $this->belongsToMany(band::class);
    }

    public function songs()
    {
        return $this->belongsToMany(music::class);
    }
}
