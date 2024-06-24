<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [
        'user_id','service_id','booking_type','start_date','end_date','adult','child','room_type','status','seen',
    ];
}
