<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class HistoryInstrukturController extends Controller
{
    public function getHistory($id_instruktur)
    {
        $instruktur = DB::table('instruktur')->where('ID_INSTRUKTUR','=',$id_instruktur)->first();

        if(is_null($instruktur)) {
            return response([
                'message' => 'Instruktur Not Found',
                'data' => null
            ], 400);
        }

        $getData = DB::table('jadwal_harian')
            ->join('instruktur','jadwal_harian.ID_INSTRUKTUR','instruktur.ID_INSTRUKTUR')
            ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','jadwal_default.ID_JADWAL_DEFAULT')
            ->join('kelas','jadwal_default.ID_KELAS','kelas.ID_KELAS')
            ->join('presensi_instruktur','jadwal_harian.ID_JADWAL_HARIAN','presensi_instruktur.ID_PRESENSI_INSTRUKTUR')
            ->where('STATUS_KELAS','Selesai')
            ->where('jadwal_harian.ID_INSTRUKTUR','=',$id_instruktur)
            ->select('NAMA_KELAS','HARI_JADWAL_DEFAULT','TANGGAL','NAMA_INSTRUKTUR','HARGA_KELAS','WAKTU_MULAI_KELAS','WAKTU_SELESAI_KELAS')
            ->get();

        return response([
            'message' => 'Berhasil menampilkan histori instruktur mengajar',
            'data' => $getData
        ], 200);
    }
}