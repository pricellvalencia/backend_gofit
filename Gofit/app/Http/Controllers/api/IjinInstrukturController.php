<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IjinInstruktur;
use Validator;
use Illuminate\Support\Facades\DB;

class IjinInstrukturController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel ijin_instruktur
        $ijin_instruktur = DB::table('ijin_instruktur')
            ->join('instruktur','ijin_instruktur.ID_INSTRUKTUR','=','instruktur.ID_INSTRUKTUR')
            ->join('jadwal_harian','ijin_instruktur.ID_JADWAL_HARIAN','=','jadwal_harian.ID_JADWAL_HARIAN')
            ->orderBy('ID_IJIN_INSTRUKTUR')
            ->get();

        if (count($ijin_instruktur) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $ijin_instruktur
            ], 200);
        } // return data semua ijin_instruktur dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data ijin_instruktur kosong
    }

    // menampilkan ijin yang pernah diajukan
    public function getIjin($id_instruktur)
    {
        $ijin_instruktur = DB::table('ijin_instruktur')
            ->leftJoin('instruktur','ijin_instruktur.ID_INSTRUKTUR_PENGGANTI','=','instruktur.ID_INSTRUKTUR')
            ->join('jadwal_harian','ijin_instruktur.ID_JADWAL_HARIAN','jadwal_harian.ID_JADWAL_HARIAN')
            ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','jadwal_default.ID_JADWAL_DEFAULT')
            ->join('kelas','jadwal_default.ID_KELAS','kelas.ID_KELAS')
            ->where('ijin_instruktur.ID_INSTRUKTUR','=',$id_instruktur)
            ->select('kelas.NAMA_KELAS','ijin_instruktur.TANGGAL_PEMBUATAN_IJIN','ijin_instruktur.TANGGAL_IJIN','ijin_instruktur.STATUS_IJIN','ijin_instruktur.TGL_KONFIRMASI','ijin_instruktur.KETERANGAN','ijin_instruktur.ID_INSTRUKTUR_PENGGANTI','instruktur.NAMA_INSTRUKTUR AS NAMA_INSTRUTKUR_PENGGANTI')
            ->get();

        if (count($ijin_instruktur) > 0) {
            return response([
                'message' => 'Berhasil menampilkan ijin yang pernah diajukan',
                'data' => $ijin_instruktur
            ], 200);
        } // return data semua ijin_instruktur dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data ijin_instruktur kosong
    }

    // menampilkan ijin instruktur yang dapat diajukan ijin
    public function getJadwal($id_instruktur)
    {
        $jadwal = DB::table('jadwal_harian')
            ->where('jadwal_harian.ID_INSTRUKTUR','=',$id_instruktur)
            ->where('STATUS_KELAS','Tersedia')
            ->where('TANGGAL','>',date('Y-m-d'))
            ->join('instruktur','jadwal_harian.ID_INSTRUKTUR','instruktur.ID_INSTRUKTUR')
            ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','jadwal_default.ID_JADWAL_DEFAULT')
            ->join('kelas','jadwal_default.ID_KELAS','kelas.ID_KELAS')
            ->select('jadwal_harian.ID_JADWAL_HARIAN','jadwal_default.HARI_JADWAL_DEFAULT','jadwal_harian.TANGGAL','kelas.ID_KELAS','kelas.NAMA_KELAS')
            ->get();

        return response([
            'message' => 'Berhasil menampilkan jadwal instruktur',
            'data' => $jadwal,
        ], 200);
    }

    // pengajuan ijin
    public function ijin(Request $request)
    {
        $id_instruktur = $request->input('ID_INSTRUKTUR');
        $id_ijin_instruktur = IjinInstruktur::count() + 1;
        $now = date('Y-m-d H:i:s');
        $tgl_ijin = $request->input('TANGGAL_IJIN');
        $status_ijin = 'belum dikonfirmasi';
        $keterangan = $request->input('KETERANGAN');
        $pengganti = $request->input('ID_INSTRUKTUR_PENGGANTI');

        $id_jadwal = DB::table('jadwal_harian')
            ->where('TANGGAL','=',$tgl_ijin)
            ->where('ID_INSTRUKTUR','=',$id_instruktur)
            ->select('ID_JADWAL_HARIAN')
            ->first();

        if(is_null($id_jadwal)) {
            return response([
                'message' => 'Jadwal tidak ditemukan',
                'data' => null
            ], 400);
        }

        if($pengganti != null) {
            $ijin = DB::table('ijin_instruktur')->insert([
                'ID_IJIN_INSTRUKTUR' => $id_ijin_instruktur,
                'ID_INSTRUKTUR' => $id_instruktur,
                'TANGGAL_PEMBUATAN_IJIN' => $now,
                'TANGGAL_IJIN' => $tgl_ijin,
                'STATUS_IJIN' => $status_ijin,
                'TGL_KONFIRMASI' => NULL,
                'ID_JADWAL_HARIAN' => $id_jadwal->ID_JADWAL_HARIAN,
                'KETERANGAN' => $keterangan,
                'ID_INSTRUKTUR_PENGGANTI' => $pengganti,
            ]);
    
            return response([
                'message' => 'Berhasil mengajukan ijin',
                'data' => $ijin,
            ], 200);
        } else {
            $ijin = DB::table('ijin_instruktur')->insert([
                'ID_IJIN_INSTRUKTUR' => $id_ijin_instruktur,
                'ID_INSTRUKTUR' => $id_instruktur,
                'TANGGAL_PEMBUATAN_IJIN' => $now,
                'TANGGAL_IJIN' => $tgl_ijin,
                'STATUS_IJIN' => $status_ijin,
                'TGL_KONFIRMASI' => NULL,
                'ID_JADWAL_HARIAN' => $id_jadwal->ID_JADWAL_HARIAN,
                'KETERANGAN' => $keterangan,
                'ID_INSTRUKTUR_PENGGANTI' => null,
            ]);
    
            return response([
                'message' => 'Berhasil mengajukan ijin',
                'data' => $ijin,
            ], 200);
        }
    }

    // menu mo
    public function konfirmasi(Request $request, $id_ijin_instruktur)
    { // untuk mengonfirmasi ijin instruktur
        $ijin_instruktur = IjinInstruktur::where('ID_IJIN_INSTRUKTUR','=',$id_ijin_instruktur)->first();
        
        if(is_null($ijin_instruktur)){
            return response([
                'message' => 'Ijin Instruktur Not Found',
                'data' => null
            ], 404);
        }

        if($ijin_instruktur->STATUS_IJIN == 'belum dikonfirmasi') {
            if($ijin_instruktur->ID_INSTRUKTUR_PENGGANTI != NULL) {
                DB::table('ijin_instruktur')
                    ->where('ID_IJIN_INSTRUKTUR','=',$id_ijin_instruktur)
                    ->update([
                        'STATUS_IJIN' => 'dikonfirmasi',
                        'TGL_KONFIRMASI' => date('Y-m-d H:i:s')
                    ]);
    
                DB::table('jadwal_harian')
                    ->join('presensi_instruktur','jadwal_harian.ID_JADWAL_HARIAN','presensi_instruktur.ID_PRESENSI_INSTRUKTUR')
                    ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','jadwal_default.ID_JADWAL_DEFAULT')
                    ->where('ID_JADWAL_HARIAN','=',$ijin_instruktur->ID_JADWAL_HARIAN)
                    ->update([
                        'jadwal_harian.ID_INSTRUKTUR' => $ijin_instruktur->ID_INSTRUKTUR_PENGGANTI,
                        'presensi_instruktur.ID_INSTRUKTUR' => $ijin_instruktur->ID_INSTRUKTUR_PENGGANTI,
                        'jadwal_default.ID_INSTRUKTUR' => $ijin_instruktur->ID_INSTRUKTUR_PENGGANTI,
                    ]);
    
                return response([
                    'message' => 'Ijin Instruktur Berhasil Dikonfirmasi',
                    'data' => $ijin_instruktur,
                ], 200);
            } else {
                DB::table('ijin_instruktur')
                    ->where('ID_IJIN_INSTRUKTUR','=',$id_ijin_instruktur)
                    ->update([
                        'STATUS_IJIN' => 'dikonfirmasi',
                        'TGL_KONFIRMASI' => date('Y-m-d H:i:s')
                    ]);
    
                DB::table('jadwal_harian')
                    ->join('presensi_instruktur','jadwal_harian.ID_JADWAL_HARIAN','presensi_instruktur.ID_PRESENSI_INSTRUKTUR')
                    ->where('ID_JADWAL_HARIAN','=',$ijin_instruktur->ID_JADWAL_HARIAN)
                    ->update([
                        // 'jadwal_harian.ID_INSTRUKTUR' => null,
                        // 'presensi_instruktur.ID_INSTRUKTUR' => null,
                        'jadwal_harian.STATUS_KELAS' => 'Libur',
                        'jadwal_harian.SISA_MEMBER_KELAS' => '0',
                    ]);
    
                return response([
                    'message' => 'Ijin Instruktur Berhasil Dikonfirmasi',
                    'data' => $ijin_instruktur,
                ], 200);
            }
        }

        return response([
            'message' => 'Ijin Instruktur sudah dikonfirmasi sebelumnya',
            'data' => null,
        ], 400);
    }
}