<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;
    
    protected $table = 'instruktur';
    protected $primaryKey = 'ID_INSTRUKTUR';
    public $timestamps = false;
    protected $fillable = [
        'NAMA_INSTRUKTUR',
        'ALAMAT_INSTRUKTUR',
        'TELEPON_INSTRUKTUR',
        'TANGGAL_LAHIR_INSTRUKTUR',
        'EMAIL_INSTRUKTUR',
        'PASSWORD_INSTRUKTUR',
        'KETERLAMBATAN',
    ];
}
