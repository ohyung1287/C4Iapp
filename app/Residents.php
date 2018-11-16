<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residents extends Model
{
    //
    protected $fillable = ['id', 'name', 'roomid','phone','mobile','email','isactivity','token'];
}
