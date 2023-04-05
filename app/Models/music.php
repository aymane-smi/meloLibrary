<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class music extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(categories::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function bands()
    {
        return $this->belongsToMany(band::class);
    }

    public function comments()
    {
        return $this->belongsToMany(comment::class);
    }

    public function writers()
    {
        return $this->hasMany(writers::class);
    }
}
