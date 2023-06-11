<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiMemberGym extends Model
{
    use HasFactory;

    protected $table = 'presensi_member_gym';
    protected $primaryKey = 'ID_PRESENSI_GYM';
    public $timestamps = false;
    protected $fillable = [
        'ID_PRESENSI_GYM',
        'ID_MEMBER',
        'WAKTU_PRESENSI_MEMBER_GYM',
    ];
}
