<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalHarian;
use App\Models\JadwalDefault;
use App\Models\IjinInstruktur;
use App\Models\PresensiInstruktur;
use Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JadwalHarianController extends Controller
{ // UNTUK MENGAMBIL SEMUA DATA YANG ADA ADI TABEL JADWAL_HARIAN
    public function index()
    {
        $jadwal_harian = DB::table('jadwal_harian')->
            join('instruktur','jadwal_harian.ID_INSTRUKTUR','=','instruktur.ID_INSTRUKTUR')->
            join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','=','jadwal_default.ID_JADWAL_DEFAULT')->
            join('kelas','jadwal_default.ID_KELAS','=','kelas.ID_KELAS')->
            orderBy('jadwal_harian.TANGGAL', 'asc')->
            get();

        if (count($jadwal_harian) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $jadwal_harian
            ], 200);
        } // return data semua jadwal_harian dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data jadwal_harian kosong
    }

    public function generateJadwalHarian()
    { // UNTUK MENGENERATE DATA JADWAL HARIAN DARI TABEL JADWAL_DEFAULT
        $jadwalDefault = JadwalDefault::orderByRaw("FIELD(HARI_JADWAL_DEFAULT, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu') ASC, SESI_JADWAL_DEFAULT ASC")
            ->join('instruktur', 'jadwal_default.ID_INSTRUKTUR', '=', 'instruktur.ID_INSTRUKTUR')
            ->join('kelas', 'jadwal_default.ID_KELAS', '=', 'kelas.ID_KELAS')
            ->get();

        //cek jadwal dengan tanggal di minggu ini
        $cek = JadwalHarian::where('TANGGAL', Carbon::now()->startOfWeek()->format('Y-m-d'))->first();
        // $cek = JadwalHarian::exists();
        if ($cek != null) {
            return response()->json([
                'message' => 'Jadwal Harian already created'
            ], 400);
        } else {
            // Mendapatkan daftar ID_JADWAL_DEFAULT yang sudah ada di tabel jadwal_harian
            $jadwalHarianExistingIds = DB::table('jadwal_harian')->pluck('ID_JADWAL_DEFAULT')->toArray();

            // masukkan $jadwalDefault ke $jadwalHarian berdasarkan hari dengan tanggal yang sesuai dengan hari tersebut
            $jadwalHarian = [];
            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    
            for ($i = 0; $i < 7; $i++) {
                $now = Carbon::now()->startOfWeek()->modify('+' . $i . ' day');
                $jadwalHarianPerHari = $jadwalDefault->filter(function ($jadwal) use ($hari, $i, $jadwalHarianExistingIds) {
                    return $jadwal->HARI_JADWAL_DEFAULT == $hari[$i] && !in_array($jadwal->ID_JADWAL_DEFAULT, $jadwalHarianExistingIds);
                })->map(function ($jadwal) use ($now) {
                    $waktuJadwal = Carbon::parse($jadwal->SESI_JADWAL_DEFAULT);
                    $tanggalJadwal = $now->format('Y-m-d');
                    $tanggalWaktuJadwal = $tanggalJadwal . ' ' . $waktuJadwal->format('H:i') . ':00';
                    
                    return [
                        'TANGGAL' => $tanggalWaktuJadwal,
                        'ID_JADWAL_DEFAULT' => $jadwal->ID_JADWAL_DEFAULT,
                        'ID_INSTRUKTUR' => $jadwal->ID_INSTRUKTUR,
                        'SISA_MEMBER_KELAS' => 10,
                        'STATUS_KELAS' => 'Tersedia',
                    ];
                })->toArray();
            
                $jadwalHarian = array_merge($jadwalHarian, $jadwalHarianPerHari);
            }
    
            // masukkan data ke database jadwal_harian
            JadwalHarian::insert($jadwalHarian);
    
            // dapatkan ID jadwal harian yang baru di-generate
            $insertedJadwalHarianIds = JadwalHarian::whereIn('TANGGAL', array_column($jadwalHarian, 'TANGGAL'))
                ->whereIn('ID_INSTRUKTUR', array_column($jadwalHarian, 'ID_INSTRUKTUR'))
                ->pluck('ID_JADWAL_HARIAN');
    
            // perbarui data di tabel ijin_instruktur dengan ID_JADWAL_HARIAN yang baru
            foreach ($jadwalHarian as $index => $jadwal) {
                $tanggalJadwal = $jadwal['TANGGAL'];
                $idInstruktur = $jadwal['ID_INSTRUKTUR'];
                $idJadwalHarian = $insertedJadwalHarianIds[$index];
    
                $ijinInstrukturs = IjinInstruktur::where('TANGGAL_IJIN', $tanggalJadwal)
                    ->where('ID_INSTRUKTUR', $idInstruktur)
                    ->get();
    
                foreach ($ijinInstrukturs as $ijinInstruktur) {
                    $ijinInstruktur->ID_JADWAL_HARIAN = $idJadwalHarian;
                    $ijinInstruktur->save();
                }
            }
    
            $jadwal_harian = JadwalHarian::all();
    
            // Menyiapkan data presensi instruktur
            $presensiInstruktur = [];
    
            foreach ($jadwal_harian as $jadwal) {
                $idJadwalHarian = $jadwal['ID_JADWAL_HARIAN'];
                $idInstruktur = $jadwal['ID_INSTRUKTUR'];
    
                $presensiInstruktur[] = [
                    'ID_INSTRUKTUR' => $idInstruktur,
                    'ID_PRESENSI_INSTRUKTUR' => $idJadwalHarian,
                ];
            }

            // Memasukkan data presensi instruktur ke dalam tabel jika data belum ada
            foreach ($presensiInstruktur as $presensi) {
                $idPresensiInstruktur = $presensi['ID_PRESENSI_INSTRUKTUR'];
                $idInstruktur = $presensi['ID_INSTRUKTUR'];

                PresensiInstruktur::firstOrCreate(
                    ['ID_PRESENSI_INSTRUKTUR' => $idPresensiInstruktur, 'ID_INSTRUKTUR' => $idInstruktur]
                );
            }
    
            return response()->json([
                'message' => 'Jadwal Harian created successfully',
                'data' => $jadwalHarian
            ], 200);
        }
    }

    public function liburKelas(Request $request, $id_jadwal_harian)
    { // meliburkan kelas
        $jadwal_harian = JadwalHarian::where('ID_JADWAL_HARIAN', '=', $id_jadwal_harian)->first(); //  Mengambil data paket berdasarkan id_member

        if(is_null($jadwal_harian)){
            return response([
                'message' => 'Jadwal Harian Not Found',
                'data' => null
            ], 404);
        }

        $jadwal_harian->STATUS_KELAS = 'Libur';
        $jadwal_harian->save();

        return response()->json([
            'message' => 'Berhasil meliburkan kelas',
            'data' => $jadwal_harian,
        ]);
    }
}
