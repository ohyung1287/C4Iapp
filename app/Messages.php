<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = ['id', 'name','roomId', 'email','topic','content'];
}
