<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LostFound extends Model
{
    //
      protected $fillable = ['id','title', 'name', 'roomId','email','subject','message'];
}
