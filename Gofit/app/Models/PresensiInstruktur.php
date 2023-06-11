<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiInstruktur extends Model
{
    use HasFactory;

    protected $table = 'presensi_instruktur';
    protected $primaryKey = 'ID_PRESENSI_INSTRUKTUR';
    public $timestamps = false;
    protected $fillable = [
        'ID_PRESENSI_INSTRUKTUR',
        'ID_INSTRUKTUR',
        'WAKTU_MULAI_KELAS',
        'WAKTU_SELESAI_KELAS',
        'DURASI_KELAS',
        'KETERLAMBATAN',
    ];
}
