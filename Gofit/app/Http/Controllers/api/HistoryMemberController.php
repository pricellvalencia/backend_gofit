<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class HistoryMemberController extends Controller
{
    public function getBookingKelas($id_member)
    {
        $member = DB::table('member')->where('ID_MEMBER','=',$id_member)->first();

        if(is_null($member)) {
            return response([
                'message' => 'Member Not Found',
                'data' => null,
            ], 400);
        }

        $getbooking = DB::table('booking_kelas')
            ->join('member','booking_kelas.ID_MEMBER','member.ID_MEMBER')
            ->join('jadwal_harian','booking_kelas.ID_JADWAL_HARIAN','jadwal_harian.ID_JADWAL_HARIAN')
            ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','jadwal_default.ID_JADWAL_DEFAULT')
            ->join('kelas','jadwal_default.ID_KELAS','kelas.ID_KELAS')
            ->join('presensi_member_kelas', 'booking_kelas.ID_BOOKING_KELAS', 'presensi_member_kelas.ID_PRESENSI_KELAS')
            ->select('NAMA_KELAS','TANGGAL','STATUS_BOOKING_KELAS','SISA_DEPOSIT')
            ->where('booking_kelas.ID_MEMBER','=',$id_member)
            ->get();

        $getbooking->transform(function ($item, $key) {
            $item->JENIS_PEMBAYARAN = (strlen($item->SISA_DEPOSIT) <= 3) ? 'Deposit Kelas' : 'Deposit Uang';
            if($item->STATUS_BOOKING_KELAS == 'Booked') {
                $item->STATUS_BOOKING_KELAS = ($item->TANGGAL <= date('Y-m-d H:i:s')) ? 'Tidak Hadir' : 'Booked';
            }
            unset($item->SISA_DEPOSIT); // Menghapus kolom "SISA_DEPOSIT"
            return $item;
        });
        
        return response([
            'message' => 'Berhasil get history booking kelas',
            'data' => $getbooking,
        ], 200);
    }

    public function getBookingGym($id_member)
    {
        $member = DB::table('member')->where('ID_MEMBER','=',$id_member)->first();

        if(is_null($member)) {
            return response([
                'message' => 'Member Not Found',
                'data' => null,
            ], 400);
        }

        $getbooking = DB::table('booking_sesi_gym')
            ->where('ID_MEMBER','=',$id_member)
            ->select('TGL_DIBOOKING','SESI_GYM','STATUS_BOOKING_GYM')
            ->get();

        $getbooking->transform(function ($item, $key) {
            if($item->STATUS_BOOKING_GYM == 'Booked') {
                $item->STATUS_BOOKING_GYM = ($item->TGL_DIBOOKING <= date('Y-m-d')) ? 'Tidak Hadir' : 'Booked';
            }
            return $item;
        });
        return response([
            'message' => 'berhasil get history booking gym',
            'data' => $getbooking,
        ], 200);
    }
}