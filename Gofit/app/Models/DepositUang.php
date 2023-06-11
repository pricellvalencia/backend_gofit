<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositUang extends Model
{
    use HasFactory;
    
    protected $table = 'transaksi_deposit_uang';
    protected $primaryKey = 'ID_TRANSAKSI_DEPOSIT_UANG';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID_TRANSAKSI_DEPOSIT_UANG',
        'ID_PEGAWAI',
        'ID_MEMBER',
        'ID_PROMO',
        'TGL_TRANSAKSI_DEPOSIT_UANG',
        'JUMLAH_TRANSAKSI_DEPOSIT_UANG',
        'BONUS_DEPOSIT_UANG',
        'TOTAL_TRANSAKSI_DEPOSIT_UANG',
        'SISA_DEPOSIT',
    ];
}
