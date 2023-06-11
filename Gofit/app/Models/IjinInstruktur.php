<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IjinInstruktur extends Model
{
    use HasFactory;
    
    protected $table = 'ijin_instruktur';
    protected $primaryKey = 'ID_IJIN_INSTRUKTUR';
    public $timestamps = false;
    protected $fillable = [
        'ID_INSTRUKTUR',
        'ID_INSTRUKTUR_PENGGANTI',
        'WAKTU_IJIN',
        'TGL_KONFIRMASI',
        'STATUS_IJIN',
        'KETERANGAN',
    ];
}
