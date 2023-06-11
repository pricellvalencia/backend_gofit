<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDefault extends Model
{
    use HasFactory;

    protected $table = 'jadwal_default';
    protected $primaryKey = 'ID_JADWAL_DEFAULT';
    public $timestamps = false; 
    protected $fillable = [
        'ID_JADWAL_DEFAULT',
        'ID_INSTRUKTUR',
        'ID_KELAS',
        'SESI_JADWAL_DEFAULT',
        'HARI_JADWAL_DEFAULT',
    ];
}
