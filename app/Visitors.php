<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    //
    protected $fillable = ['id', 'name', 'email','phone','roomNumber','time_in','time_out'];
}
