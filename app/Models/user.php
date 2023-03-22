<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function setPasswordAttribute($password){
        $this->attributes["password"] = bcrypt($password);
    }
}
