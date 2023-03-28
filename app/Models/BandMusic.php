<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BandMusic extends Model
{
    use HasFactory;

    protected $table = "band_music";

    public $timestamps = false;

    protected $guarded = [];
}
