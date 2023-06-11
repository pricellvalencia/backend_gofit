<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    protected $table = 'Gym';
    protected $primaryKey = 'ID_GYM';
    public $timestamps = false;
    protected $fillable = [
        'ID_GYM',
        'TANGGAL_GYM',
        'SESI_GYM',
        'SLOT',
    ];
}
