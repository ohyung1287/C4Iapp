<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facility_booking extends Model
{
     protected $fillable = ['id', 'facility_name', 'duration','facility_desc','fee'];
}
