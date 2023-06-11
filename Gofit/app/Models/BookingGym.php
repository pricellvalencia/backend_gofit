<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingGym extends Model
{
    use HasFactory;

    protected $table = 'booking_sesi_gym';
    protected $primaryKey = 'ID_BOOKING_GYM';
    public $timestamps = false;
    protected $fillable = [
        'ID_BOOKING_GYM',
        'ID_MEMBER',
        'TGL_BOOKING_GYM',
        'TGL_DIBOOKING',
        'SESI_GYM',
        'STATUS_BOOKING_GYM',
    ];
}
