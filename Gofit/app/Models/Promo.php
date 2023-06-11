<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $table = 'promo';
    public $timestamps = false;
    protected $primaryKey = 'ID_PROMO';
    protected $fillable = [
        'ID_PROMO',
        'NAMA_PROMO',
        'DESKRIPSI_PROMO',
        'MINIMAL_PEMBELIAN',
        'BONUS',
        'WAKTU_MULAI_PROMO',
        'WAKTU_SELESAI_PROMO'
    ];
}
