<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LostFoundTopic extends Model
{
    //
    protected $fillable = ['id','residentId', 'email','subject','message','date'];

}
