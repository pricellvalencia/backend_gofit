<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';
    protected $primaryKey = 'ID_MEMBER';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID_MEMBER',
        'NAMA_MEMBER',
        'ALAMAT_MEMBER',
        'TELEPON_MEMBER',
        'TANGGAL_LAHIR_MEMBER',
        'JUMLAH_DEPOSIT_UANG',
        'EMAIL',
        'USERNAME_MEMBER',
        'PASSWORD_MEMBER',
        'WAKTU_MULAI_AKTIVASI',
        'WAKTU_AKTIVASI_EKSPIRED',
        'WAKTU_DAFTAR_MEMBER',
        'STATUS_MEMBER',
    ];
}
