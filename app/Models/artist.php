<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artist extends Model
{
    use HasFactory;

    public function bands()
    {
        return $this->belongsToMany(band::class);
    }

    public function songs()
    {
        return $this->belongsToMany(msuic::class);
    }
}
