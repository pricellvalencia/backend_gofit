<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PresensiInstruktur;
use App\Models\JadwalHarian;
use App\Models\Gym;
use Validator;
use Illuminate\Support\Facades\DB;
use DateTime;

class PresensiInstrukturController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel presensi_instruktur dengan tanggal hari ini
        $presensi_instruktur = DB::table('presensi_instruktur')
            ->join('instruktur','presensi_instruktur.ID_INSTRUKTUR','=','instruktur.ID_INSTRUKTUR')
            ->join('jadwal_harian','presensi_instruktur.ID_PRESENSI_INSTRUKTUR','=','jadwal_harian.ID_JADWAL_HARIAN')
            ->get();
        if (count($presensi_instruktur) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $presensi_instruktur
            ], 200);
        } // return data semua presensi_instruktur dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data presensi_instruktur kosong
    }

    public function showToday()
    { // untuk menampilkan semua data di tabel presensi_instruktur dengan tanggal hari ini
        $now = date('Y-m-d');

        $presensi_instruktur = DB::table('presensi_instruktur')
            ->join('instruktur','presensi_instruktur.ID_INSTRUKTUR','=','instruktur.ID_INSTRUKTUR')
            ->join('jadwal_harian','presensi_instruktur.ID_PRESENSI_INSTRUKTUR','=','jadwal_harian.ID_JADWAL_HARIAN')
            ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','jadwal_default.ID_JADWAL_DEFAULT')
            ->join('kelas','jadwal_default.ID_KELAS','kelas.ID_KELAS')
            ->whereRaw("DATE(jadwal_harian.TANGGAL) = DATE('$now')")
            ->select('NAMA_KELAS','NAMA_INSTRUKTUR','WAKTU_MULAI_KELAS','WAKTU_SELESAI_KELAS','ID_PRESENSI_INSTRUKTUR')
            ->get();
        if (count($presensi_instruktur) > 0) {
            return response([
                'message' => 'Berhasil menampilkan list kelas hari ini',
                'data' => $presensi_instruktur
            ], 200);
        } // return data semua presensi_instruktur dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data presensi_instruktur kosong
    }

    public function startClass(Request $request, $id_presensi_instruktur)
    { //untuk mengupdate jam mulai kelas
        $presensi_instruktur = PresensiInstruktur::where('ID_PRESENSI_INSTRUKTUR','=',$id_presensi_instruktur)->first();
        $jadwal = JadwalHarian::where('ID_JADWAL_HARIAN','=',$id_presensi_instruktur)->first();

        if(is_null($presensi_instruktur)){
            return response([
                'message' => 'Presensi Instruktur Not Found',
                'data' => null
            ], 404);
        }

        $now = date('Y-m-d H:i:s');

        if($presensi_instruktur->WAKTU_MULAI_KELAS == NULL) {
            $jadwal_timestamp = strtotime($jadwal->TANGGAL);
            $end_time_timestamp = date('Y-m-d H:i:s', strtotime('+1.5 hours', $jadwal_timestamp));

            if($now < $jadwal_timestamp) {
                return response([
                    'message' => 'Belum waktunya kelas[!]',
                    'data' => ['Waktu: ' => $jadwal->TANGGAL]
                ], 401);
            } else if($now > $end_time_timestamp) {
                return response([
                    'message' => 'Sudah melewati waktunya kelas[!]',
                    'data' => ['Harus mulai sebelum' => $end_time_timestamp, 'now' => $now]
                ], 402);
            } else {
                $presensi_instruktur->WAKTU_MULAI_KELAS = $now;
                $presensi_instruktur->save();
        
                DB::table('jadwal_harian')
                    ->where('ID_JADWAL_HARIAN','=',$id_presensi_instruktur)
                    ->update([
                        'STATUS_KELAS' => 'Dimulai',
                        'SISA_MEMBER_KELAS' => 0
                    ]);
        
                return response([
                    'message' => 'Kelas dimulai',
                    'data' => $presensi_instruktur
                ], 200);
            }
        } else if($presensi_instruktur->WAKTU_MULAI_KELAS != NULL && $presensi_instruktur->WAKTU_SELESAI_KELAS == NULL){
            return response([
                'message' => 'Kelas sedang berlangsung',
                'data' => $presensi_instruktur
            ], 403);
        } else {
            return response([
                'message' => 'Kelas sudah selesai',
                'data' => $presensi_instruktur
            ], 404);
        }
    }

    public function endClass(Request $request, $id_presensi_instruktur)
    { //untuk mengupdate jam mulai kelas
        $presensi_instruktur = PresensiInstruktur::where('ID_PRESENSI_INSTRUKTUR','=',$id_presensi_instruktur)->first();
        $jadwal = JadwalHarian::where('ID_JADWAL_HARIAN','=',$id_presensi_instruktur)->first();

        if(is_null($presensi_instruktur)){
            return response([
                'message' => 'Presensi Instruktur Not Found',
                'data' => null
            ], 404);
        }

        $now = date('Y-m-d H:i:s');

        if($presensi_instruktur->WAKTU_MULAI_KELAS == NULL) {
            return response([
                'message' => 'Kelas belum dimulai',
                'data' => $presensi_instruktur
            ], 401);
        } else if($presensi_instruktur->WAKTU_MULAI_KELAS != NULL && $presensi_instruktur->WAKTU_SELESAI_KELAS == NULL) {
            $start = new DateTime($presensi_instruktur->WAKTU_MULAI_KELAS);
            $end = new DateTime($presensi_instruktur->WAKTU_SELESAI_KELAS);
            $time = new DateTime($jadwal->TANGGAL);

            // durasi kelas
            $duration = $start->diff($end);
            $hours = $duration->h; // Jam
            $minutes = $duration->i; // Menit
            $seconds = $duration->s; // Detik
            $durasi = $hours*60*60 + $minutes*60 + $seconds;

            // keterlambatan dalam detik
            $terlambat = $time->diff($start);
            $hour = $terlambat->h; // Jam
            $minute = $terlambat->i; // Menit
            $seconds = $duration->s; // Detik
            $keterlambatan = $hour*60*60 + $minute*60 + $seconds;

            $presensi_instruktur->WAKTU_SELESAI_KELAS = $now;
            $presensi_instruktur->DURASI_KELAS = $durasi;
            $presensi_instruktur->KETERLAMBATAN = $keterlambatan;
            $presensi_instruktur->save();

            DB::table('jadwal_harian')
                ->where('ID_JADWAL_HARIAN','=',$id_presensi_instruktur)
                ->update([
                    'STATUS_KELAS' => 'Selesai'
                ]);
    
            return response([
                'message' => 'Kelas diselesaikan',
                'data' => $presensi_instruktur
            ], 200);
        } else {
            return response([
                'message' => 'Kelas sudah selesai',
                'data' => $presensi_instruktur
            ], 402);
        }
    }
}