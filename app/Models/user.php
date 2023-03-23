<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function setPasswordAttribute($password){
        $this->attributes["password"] = bcrypt($password);
    }
}
