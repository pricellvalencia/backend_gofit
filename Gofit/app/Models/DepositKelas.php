<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositKelas extends Model
{
    use HasFactory;

    protected $table = 'transaksi_deposit_kelas';
    protected $primaryKey = 'ID_TRANSAKSI_DEPOSIT_KELAS';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID_TRANSAKSI_DEPOSIT_KELAS',
        'ID_PEGAWAI',
        'ID_MEMBER',
        'ID_KELAS',
        'ID_PROMO',
        'TGL_TRANSAKSI_DEPOSIT_KELAS',
        'JUMLAH_TRANSAKSI_DEPOSIT_KELAS',
        'BONUS_DEPOSIT_KELAS',
        'TOTAL_PEMBAYARAN',
        'MASA_BERLAKU',
    ];
}
