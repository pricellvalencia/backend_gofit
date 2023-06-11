<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositPaketKelas extends Model
{
    use HasFactory;

    protected $table = 'deposit_paket_kelas';
    protected $primaryKey = 'ID_DEPOSIT_PAKET_KELAS';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'ID_DEPOSIT_PAKET_KELAS',
        'ID_KELAS',
        'ID_MEMBER',
        'DEPOSIT_PAKET_KELAS',
        'TGL_KADALUARSA',
    ];
}
