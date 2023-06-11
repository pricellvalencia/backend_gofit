<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiAktivasi extends Model
{
    use HasFactory;
    protected $table = 'transaksi_aktivasi';
    protected $primaryKey = 'ID_TRANSAKSI_AKTIVASI';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID_TRANSAKSI_AKTIVASI',
        'ID_PEGAWAI',
        'ID_MEMBER',
        'TGL_TRANSAKSI_AKTIVASI',
        'MASA_BERLAKU_TRANSAKSI_AKTIVASI',
        'JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI'
    ];
}
