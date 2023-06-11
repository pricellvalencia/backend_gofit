<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PresensiMemberKelas;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PresensiKelasController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel presensi_member_kelas
        $presensi_member_kelas = DB::table('presensi_member_kelas')
                    ->join('jadwal_harian','presensi_member_kelas.ID_JADWAL_HARIAN','=','jadwal_harian.ID_JADWAL_HARIAN')
                    ->join('member','presensi_member_kelas.ID_MEMBER','=','member.ID_MEMBER')
                    ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','=','jadwal_default.ID_JADWAL_DEFAULT')
                    ->join('kelas','jadwal_default.ID_KELAS','=','kelas.ID_KELAS')
                    ->join('instruktur','jadwal_default.ID_INSTRUKTUR','=','instruktur.ID_INSTRUKTUR')
                    ->where(function ($query) {
                        $query->where('WAKTU_PRESENSI_MEMBER_KELAS', '<>', '-')
                            ->orWhereNull('WAKTU_PRESENSI_MEMBER_KELAS');
                    })
                    ->orderBy('presensi_member_kelas.ID_PRESENSI_KELAS')
                    ->get();
        if (count($presensi_member_kelas) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $presensi_member_kelas
            ], 200);
        } // return data semua presensi_member_kelas dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data presensi_member_kelas kosong
    }

    // mengecek apakah instruktur sudah di presensi oleh mo
    // jika sudha maka mereturnkan data member yang membooking kelas tsb
    public function cekPresensiInstruktur(Request $request)
    {
        $id_instruktur = $request->input('ID_INSTRUKTUR'); 
        $jadwal = $request->input('TANGGAL');
        $tanggal = Carbon::parse($jadwal)->format('Y-m-d');

        $presensi = DB::table('presensi_instruktur')
            ->join('jadwal_harian','presensi_instruktur.ID_PRESENSI_INSTRUKTUR','jadwal_harian.ID_JADWAL_HARIAN')
            ->where('presensi_instruktur.ID_INSTRUKTUR','=',$id_instruktur)
            ->where('jadwal_harian.TANGGAL','=',$jadwal)
            ->first();

        if(is_null($presensi)) {
            return response([
                'message' => 'Data tidak ditemukan'
            ], 400);
        } else if($tanggal == date('Y-m-d')) {
            if($presensi->WAKTU_MULAI_KELAS != null) {
                return response([
                    'message' => 'Anda sudah dipresensi',
                    'data' => $presensi
                ], 200);
            } else {
                return response([
                    'message' => 'Anda belum dipresensi'
                ], 402);
            }
        } else {
            return response([
                'message' => 'Jadwal bukan jadwal hari ini'
            ], 401);
        }
    }

    // menampilkan member yang mengambil kelas
    public function listMember($id_jadwal_harian)
    {
        $list = DB::table('booking_kelas')
            ->join('member','booking_kelas.ID_MEMBER','member.ID_MEMBER')
            ->where('ID_JADWAL_HARIAN','=',$id_jadwal_harian)
            ->whereNotIn('STATUS_BOOKING_KELAS', ['Cancel'])
            ->get();

        return response([
            'message' => 'Berhasil menampilkan data member',
            'data' => $list
        ], 200);
    }

    // mempresensi member kelas yang hadir
    public function presensiHadir(Request $request, $kelas, $member)
    {
        // $kelas = $request->input('ID_JADWAL_HARIAN');
        // $member = $request->input('ID_MEMBER');

        // mempresensi member
        $presensi = DB::table('presensi_member_kelas')
            ->join('booking_kelas','presensi_member_kelas.ID_PRESENSI_KELAS','booking_kelas.ID_BOOKING_KELAS')
            // ->join('member','presensi_member_kelas.ID_MEMBER','member.ID_MEMBER')
            ->join('jadwal_harian','presensi_member_kelas.ID_JADWAL_HARIAN','jadwal_harian.ID_JADWAL_HARIAN')
            ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','jadwal_default.ID_JADWAL_DEFAULT')
            ->join('kelas','jadwal_default.ID_KELAS','kelas.ID_KELAS')
            ->where('presensi_member_kelas.ID_JADWAL_HARIAN','=',$kelas)
            ->where('presensi_member_kelas.ID_MEMBER','=',$member)
            ->where('booking_kelas.STATUS_BOOKING_KELAS','=','Booked')
            ->update([
                'WAKTU_PRESENSI_MEMBER_KELAS' => date('Y-m-d H:i:s'),
                'STATUS_BOOKING_KELAS' => 'Finish',
            ]);

        $getPresensi = DB::table('presensi_member_kelas')
            ->join('booking_kelas','presensi_member_kelas.ID_PRESENSI_KELAS','booking_kelas.ID_BOOKING_KELAS')
            ->join('jadwal_harian','presensi_member_kelas.ID_JADWAL_HARIAN','jadwal_harian.ID_JADWAL_HARIAN')
            ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','jadwal_default.ID_JADWAL_DEFAULT')
            ->join('kelas','jadwal_default.ID_KELAS','kelas.ID_KELAS')
            ->where('presensi_member_kelas.ID_JADWAL_HARIAN','=',$kelas)
            ->where('presensi_member_kelas.ID_MEMBER','=',$member)
            ->first();
        // melakukan pemotongan deposit
        // mengecek apakah pembayaran menggunakan deposit uang atau deposit kelas
        if($getPresensi->EXP_DPK == null) { // jika menggunakan deposit uang
            // mengurangi jumlah deposit uang
            $dp_uang = DB::table('member')
                ->where('ID_MEMBER','=',$member)
                ->update([
                    'JUMLAH_DEPOSIT_UANG' => DB::raw('JUMLAH_DEPOSIT_UANG - ' . $getPresensi->HARGA_KELAS)
                ]);

            $sisa_deposit = DB::table('member')
                ->where('ID_MEMBER','=',$member)
                ->select('JUMLAH_DEPOSIT_UANG')
                ->first();

            // mengupdate sisa deposit di tabel presensi
            $presensi_update = DB::table('presensi_member_kelas')
                ->where('ID_PRESENSI_KELAS','=',$getPresensi->ID_PRESENSI_KELAS)
                ->update([
                    'SISA_DEPOSIT' => $sisa_deposit->JUMLAH_DEPOSIT_UANG
                ]);

            return response([
                'message' => 'Berhasil melakukan presensi'
            ], 200);
        } else { // jika menggunakan deposit kelas
            $dp_kelas = DB::table('deposit_paket_kelas')
                ->where('ID_MEMBER','=',$member)
                ->where('ID_KELAS','=',$getPresensi->ID_KELAS)
                ->update([
                    'DEPOSIT_PAKET_KELAS' => DB::raw('DEPOSIT_PAKET_KELAS - 1')
                ]);

            $sisa_deposit = DB::table('deposit_paket_kelas')
                ->where('ID_MEMBER','=',$member)
                ->where('ID_KELAS','=',$getPresensi->ID_KELAS)
                ->select('DEPOSIT_PAKET_KELAS')
                ->first();

            $presensi_update = DB::table('presensi_member_kelas')
                ->where('ID_PRESENSI_KELAS','=',$getPresensi->ID_PRESENSI_KELAS)
                ->update([
                    'SISA_DEPOSIT' => $sisa_deposit->DEPOSIT_PAKET_KELAS
                ]);

            return response([
                'message' => 'Berhasil melakukan presensi'
            ], 200);
        }

        return response([
            'message' => 'Gagal melakukan presensi'
        ], 200);
    }

    // mempresensi member yang tidak hadir (deposit tetap dipotong)
    public function presensiAlpa(Request $request, $kelas, $member)
    {
        // $kelas = $request->input('ID_JADWAL_HARIAN');
        // $member = $request->input('ID_MEMBER');

        // mempresensi member
        $presensi = DB::table('presensi_member_kelas')
            ->join('booking_kelas','presensi_member_kelas.ID_PRESENSI_KELAS','booking_kelas.ID_BOOKING_KELAS')
            ->join('jadwal_harian','presensi_member_kelas.ID_JADWAL_HARIAN','jadwal_harian.ID_JADWAL_HARIAN')
            ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','jadwal_default.ID_JADWAL_DEFAULT')
            ->join('kelas','jadwal_default.ID_KELAS','kelas.ID_KELAS')
            ->where('presensi_member_kelas.ID_JADWAL_HARIAN','=',$kelas)
            ->where('presensi_member_kelas.ID_MEMBER','=',$member)
            ->where('booking_kelas.STATUS_BOOKING_KELAS','=','Booked')
            ->update([
                'WAKTU_PRESENSI_MEMBER_KELAS' => 'Tidak Hadir',
                'STATUS_BOOKING_KELAS' => 'Finish',
            ]);

        $getPresensi = DB::table('presensi_member_kelas')
            ->join('booking_kelas','presensi_member_kelas.ID_PRESENSI_KELAS','booking_kelas.ID_BOOKING_KELAS')
            ->join('jadwal_harian','presensi_member_kelas.ID_JADWAL_HARIAN','jadwal_harian.ID_JADWAL_HARIAN')
            ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','jadwal_default.ID_JADWAL_DEFAULT')
            ->join('kelas','jadwal_default.ID_KELAS','kelas.ID_KELAS')
            ->where('presensi_member_kelas.ID_JADWAL_HARIAN','=',$kelas)
            ->where('presensi_member_kelas.ID_MEMBER','=',$member)
            ->first();
        // melakukan pemotongan deposit
        // mengecek apakah pembayaran menggunakan deposit uang atau deposit kelas
        if($getPresensi->EXP_DPK == null) { // jika menggunakan deposit uang
            // mengurangi jumlah deposit uang
            $dp_uang = DB::table('member')
                ->where('ID_MEMBER','=',$member)
                ->update([
                    'JUMLAH_DEPOSIT_UANG' => DB::raw('JUMLAH_DEPOSIT_UANG - ' . $getPresensi->HARGA_KELAS)
                ]);

            $sisa_deposit = DB::table('member')
                ->where('ID_MEMBER','=',$member)
                ->select('JUMLAH_DEPOSIT_UANG')
                ->first();

            // mengupdate sisa deposit di tabel presensi
            $presensi_update = DB::table('presensi_member_kelas')
                ->where('ID_PRESENSI_KELAS','=',$getPresensi->ID_PRESENSI_KELAS)
                ->update([
                    'SISA_DEPOSIT' => $sisa_deposit->JUMLAH_DEPOSIT_UANG
                ]);

            return response([
                'message' => 'Berhasil melakukan presensi'
            ], 200);
        } else { // jika menggunakan deposit kelas
            $dp_kelas = DB::table('deposit_paket_kelas')
                ->where('ID_MEMBER','=',$member)
                ->where('ID_KELAS','=',$getPresensi->ID_KELAS)
                ->update([
                    'DEPOSIT_PAKET_KELAS' => DB::raw('DEPOSIT_PAKET_KELAS - 1')
                ]);

            $sisa_deposit = DB::table('deposit_paket_kelas')
                ->where('ID_MEMBER','=',$member)
                ->where('ID_KELAS','=',$getPresensi->ID_KELAS)
                ->select('DEPOSIT_PAKET_KELAS')
                ->first();

            $presensi_update = DB::table('presensi_member_kelas')
                ->where('ID_PRESENSI_KELAS','=',$getPresensi->ID_PRESENSI_KELAS)
                ->update([
                    'SISA_DEPOSIT' => $sisa_deposit->DEPOSIT_PAKET_KELAS
                ]);

            return response([
                'message' => 'Berhasil melakukan presensi'
            ], 200);
        }

        return response([
            'message' => 'Gagal melakukan presensi'
        ], 200);
    }
}