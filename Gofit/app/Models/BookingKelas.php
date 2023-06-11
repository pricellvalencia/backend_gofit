<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingKelas extends Model
{
    use HasFactory;

    protected $table = 'booking_kelas';
    protected $primaryKey = 'ID_BOOKING_KELAS';
    public $timestamps = false;
    protected $fillable = [
        'ID_BOOKING_KELAS',
        'ID_MEMBER',
        'ID_JADWAL_HARIAN',
        'TGL_BOOKING_KELAS',
        'STATUS_BOOKING_KELAS',
    ];
}
