<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'ID_KELAS';
    public $timestamps = false;
    protected $fillable = [
        'ID_KELAS',
        'NAMA_KELAS',
        'HARGA_KELAS',
    ];
}
