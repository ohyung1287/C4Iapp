<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityBooking extends Model
{
    //
    protected $fillable = ['id','facility_name', 'duration', 'fee','facility_desc','time_in','time_out'];
}
