<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiMemberKelas extends Model
{
    use HasFactory;

    protected $table = 'presensi_member_kelas';
    protected $primaryKey = 'ID_PRESENSI_KELAS';
    public $timestamps = false;
    protected $fillable = [
        'ID_PRESENSI_KELAS',
        'ID_JADWAL_HARIAN',
        'ID_MEMBER',
        'WAKTU_PRESENSI_MEMBER_KELAS',
        'SISA_DEPOSIT',
        'EXP_DPK',
    ];
}
