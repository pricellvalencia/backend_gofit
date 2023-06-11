<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalHarian extends Model
{
    protected $table = 'jadwal_harian';
    public $timestamps = false;
    protected $primaryKey = 'ID_JADWAL_HARIAN';
    protected $fillable = [
        'ID_JADWAL_HARIAN',
        'ID_JADWAL_DEFAULT',
        'ID_INSTRUKTUR',
        'TANGGAL',
        'STATUS_KELAS',
        'SISA_MEMBER_KELAS'
    ];
}
