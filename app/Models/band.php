<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class band extends Model
{
    use HasFactory;

    protected $table = "band";

    protected $guarded = [];

    public function members()
    {
        return $this->hasMany(members::class);
    }

    public function artists()
    {
        return $this->belongsToMany(artist::class);
    }

    public function songs()
    {
        return $this->belongsToMany(music::class);
    }
}
