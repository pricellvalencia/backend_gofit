<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingKelas;
use Validator;
use Illuminate\Support\Facades\DB;

class BookingKelasController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel booking_kelas
        $booking_kelas = DB::table('booking_kelas')
                    ->join('member','booking_kelas.ID_MEMBER','=','member.ID_MEMBER')
                    ->join('jadwal_harian','booking_kelas.ID_JADWAL_HARIAN','=','jadwal_harian.ID_JADWAL_HARIAN')
                    ->orderBy('ID_BOOKING_KELAS')
                    ->get();
        if (count($booking_kelas) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $booking_kelas
            ], 200);
        } // return data semua booking_kelas dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data booking_kelas kosong
    }

    // mengambil data jadwal kelas yang bisa dibooking
    public function getJadwal()
    {
        $now = date('Y-m-d H:i:s');

        $jadwal = DB::table('jadwal_harian')
            ->where('TANGGAL','>',$now)
            ->where('STATUS_KELAS','Tersedia')
            ->where('SISA_MEMBER_KELAS','>','0')
            ->join('instruktur','jadwal_harian.ID_INSTRUKTUR','instruktur.ID_INSTRUKTUR')
            ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','jadwal_default.ID_JADWAL_DEFAULT')
            ->join('kelas','jadwal_default.ID_KELAS','kelas.ID_KELAS')
            ->select('jadwal_harian.ID_JADWAL_HARIAN','kelas.ID_KELAS','instruktur.ID_INSTRUKTUR','jadwal_default.HARI_JADWAL_DEFAULT','jadwal_harian.TANGGAL','kelas.NAMA_KELAS','instruktur.NAMA_INSTRUKTUR','jadwal_harian.SISA_MEMBER_KELAS','kelas.HARGA_KELAS')
            ->get();

        return response([
            'message' => 'Berhasil menampilkan data',
            'data' => $jadwal
        ], 200);
    }

    //mengambil data yang sudah dibooking dan belum sampai(belum selesai)
    public function getData($id_member)
    {
        $data = DB::table('booking_kelas')
            ->join('jadwal_harian','booking_kelas.ID_JADWAL_HARIAN','jadwal_harian.ID_JADWAL_HARIAN')
            ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT','jadwal_default.ID_JADWAL_DEFAULT')
            ->join('kelas','jadwal_default.ID_KELAS','kelas.ID_KELAS')
            ->join('instruktur','jadwal_default.ID_INSTRUKTUR','instruktur.ID_INSTRUKTUR')
            ->join('presensi_member_kelas','booking_kelas.ID_BOOKING_KELAS','presensi_member_kelas.ID_PRESENSI_KELAS')
            ->where('booking_kelas.ID_MEMBER','=',$id_member)
            ->where('STATUS_BOOKING_KELAS','Booked')
            ->where('TANGGAL','>',date('Y-m-d H:i:s'))
            ->get();

        $data->transform(function ($item, $key) {
            $item->JENIS_PEMBAYARAN = (strlen($item->SISA_DEPOSIT) <= 3) ? 'Deposit Kelas' : 'Deposit Uang';
            return $item;
        });
        return response([
            'message' => 'Berhasil menampilkan data',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    { // untuk menambahkan data booking kelas ke tabel booking_kelas
        $now = date('Y-m-d H:i:s');
        $year = date('y');
        $month = date('m');
        $count = BookingKelas::count() + 1;

        $id_booking_kelas = $year.'.'.$month.'.'.str_pad($count, 3, '0', STR_PAD_LEFT); // generate id 

        //mengambil data dari tabel member
        $member = DB::table('member')
            ->where('ID_MEMBER','=',$request->ID_MEMBER)
            ->first();
        //memeriksa data member
        if(is_null($member)) {
            return response([
                'message' => 'Member Not Found',
                'data' => null,
            ], 400);
        }
        //memeriksa status aktif member
        if($member->STATUS_MEMBER == 'Aktif') {
            //mengambil data sisa kuota kelas dari tabel jadwal harian berdasarkan id  yang diinput
            $jadwal_harian = DB::table('jadwal_harian')
                ->where('ID_JADWAL_HARIAN','=',$request->ID_JADWAL_HARIAN)
                ->first();
            //mengecek sisa kuota kelas dan status kelas
            if($jadwal_harian->SISA_MEMBER_KELAS > 0 && $jadwal_harian->STATUS_KELAS == 'Tersedia') { //jika slot masih ada/belum habis dan kelas tidak libur
                //mengambil data dari tabel jadwal default berdasarkan id jadwal harian yang diinputkan
                $jadwal = DB::table('jadwal_default')
                    ->where('ID_JADWAL_DEFAULT','=',$jadwal_harian->ID_JADWAL_DEFAULT)
                    ->first();
                //mengambil data dari tabel deposit paket kelas dengan id member dan id kelas yang sesuai
                $deposit_kelas = DB::table('deposit_paket_kelas')
                    ->where('ID_MEMBER','=',$request->ID_MEMBER)
                    ->where('ID_KELAS','=',$jadwal->ID_KELAS)
                    ->first();
                //mengecek sisa deposit kelas
                if(!is_null($deposit_kelas) && $deposit_kelas->DEPOSIT_PAKET_KELAS > 0) { 
                    //jika terdapat data kelas yang sesuai di tabel deposit paket kelas
                    //dan masih memiliki deposit kelas
                    $request->merge([
                        'ID_BOOKING_KELAS' => $id_booking_kelas,
                        'TGL_BOOKING_KELAS' => $now,
                        'STATUS_BOOKING_KELAS' => 'Booked',
                    ]);
                    $validate = Validator::make($request->all(),[
                        'ID_BOOKING_KELAS' =>'required',
                        'ID_MEMBER' => 'required',
                        'ID_JADWAL_HARIAN' =>'required',
                        'TGL_BOOKING_KELAS' => 'required',
                        'STATUS_BOOKING_KELAS' => 'required',
                    ]); // membuat rule validasi input
                    if ($validate->fails()) {
                        return response([
                            'message' => $validate->errors()
                        ], 400); // return error invalid input
                    }
    
                    //menambah data booking kelas baru
                    $booking_kelas = BookingKelas::create($request->all());
    
                    //mengupdate sisa member di tabel jadwal harian
                    DB::table('jadwal_harian')
                        ->where('ID_JADWAL_HARIAN','=',$request->ID_JADWAL_HARIAN)
                        ->update([
                            'SISA_MEMBER_KELAS' => DB::raw('SISA_MEMBER_KELAS - 1')
                        ]);

                    //menambah data presensi kelas baru
                    $presensi_kelas = DB::table('presensi_member_kelas')->insert([
                        'ID_PRESENSI_KELAS' => $id_booking_kelas,
                        'ID_JADWAL_HARIAN' => $booking_kelas['ID_JADWAL_HARIAN'],
                        'ID_MEMBER' => $booking_kelas['ID_MEMBER'],
                        'WAKTU_PRESENSI_MEMBER_KELAS' => NULL,
                        'SISA_DEPOSIT' => $deposit_kelas->DEPOSIT_PAKET_KELAS,
                        'EXP_DPK' => $deposit_kelas->TGL_KADALUARSA
                    ]);

                    return response([
                        'message' => 'Berhasil menambahkan Booking Kelas baru',
                        'data' => $booking_kelas
                    ], 200);
                } else { 
                    //jika tidak ditemukan data yang sesuai
                    //maka akan mengecek sisa deposit uang
                    $request->merge([
                        'ID_BOOKING_KELAS' => $id_booking_kelas,
                        'TGL_BOOKING_KELAS' => $now,
                        'STATUS_BOOKING_KELAS' => 'Booked',
                    ]);
                    $validate = Validator::make($request->all(),[
                        'ID_BOOKING_KELAS' =>'required',
                        'ID_MEMBER' => 'required',
                        'ID_JADWAL_HARIAN' =>'required',
                        'TGL_BOOKING_KELAS' => 'required',
                        'STATUS_BOOKING_KELAS' => 'required',
                    ]); // membuat rule validasi input
                    if ($validate->fails()) {
                        return response([
                            'message' => $validate->errors()
                        ], 400); // return error invalid input
                    }

                    //mengambil data jumlah deposit uang dari tabel member
                    $deposit_uang = DB::table('member')
                        ->select('JUMLAH_DEPOSIT_UANG')
                        ->where('ID_MEMBER','=',$request->ID_MEMBER)
                        ->first();

                    $tarif = DB::table('kelas')
                        ->select('HARGA_KELAS')
                        ->where('ID_KELAS','=',$jadwal->ID_KELAS)
                        ->first();

                    // mengecek sisa deposit uang apakah cukup
                    if($deposit_uang->JUMLAH_DEPOSIT_UANG >= $tarif->HARGA_KELAS) { //jika cukup
                        //menambah data booking kelas baru
                        $booking_kelas = BookingKelas::create($request->all());
        
                        //mengupdate sisa member di tabel jadwal harian
                        DB::table('jadwal_harian')
                            ->where('ID_JADWAL_HARIAN','=',$request->ID_JADWAL_HARIAN)
                            ->update([
                                'SISA_MEMBER_KELAS' => DB::raw('SISA_MEMBER_KELAS - 1')
                            ]);

                        //menambah data presensi kelas baru
                        $presensi_kelas = DB::table('presensi_member_kelas')->insert([
                            'ID_PRESENSI_KELAS' => $id_booking_kelas,
                            'ID_JADWAL_HARIAN' => $booking_kelas['ID_JADWAL_HARIAN'],
                            'ID_MEMBER' => $booking_kelas['ID_MEMBER'],
                            'WAKTU_PRESENSI_MEMBER_KELAS' => NULL,
                            'SISA_DEPOSIT' => $deposit_uang->JUMLAH_DEPOSIT_UANG
                        ]);

                        return response([
                            'message' => 'Berhasil menambahkan Booking Kelas baru',
                            'data' => $booking_kelas
                        ], 200);
                    } else { //jika tidak cukup akan menampilkan error
                        return response([
                            'message' => 'Jumlah deposit kelas dan deposit uang anda tidak cukup',
                            'data' => [
                                'Deposit uang' => $deposit_uang,
                                'Tarif kelas' => $tarif
                            ]
                        ], 403);
                    }
                }
            } else { //jika slot sudah habis atau status kelas libur
                return response([
                    'message' => 'Kuota kelas sudah habis atau kelas libur',
                    'data' => null,
                ], 402);
            }
        } else {
            return response([
                'message' => 'Member tidak aktif[!]',
                'data' => null,
            ], 401);
        }
    }

    public function batalBooking($id_booking_kelas)
    { //untuk membatalkan booking dengan maksimal h-1
        $booking_kelas = DB::table('booking_kelas')
            ->join('jadwal_harian','booking_kelas.ID_JADWAL_HARIAN','jadwal_harian.ID_JADWAL_HARIAN')
            ->where('ID_BOOKING_KELAS','=',$id_booking_kelas)
            ->first();

        $tanggal_booking = strtotime($booking_kelas->TANGGAL);
        $maks_batal = date('Y-m-d H:i:s', strtotime('-1 day', $tanggal_booking));

        // mengecek status booking apakah masih dibooking
        if($booking_kelas->STATUS_BOOKING_KELAS == 'Booked') {
            // mengecek apakah tanggal saat ini masih kurang dari h-1 
            if(date('Y-m-d H:i:s') <= $maks_batal) {
                DB::table('booking_kelas')
                    ->join('jadwal_harian','booking_kelas.ID_JADWAL_HARIAN','jadwal_harian.ID_JADWAL_HARIAN')
                    ->join('presensi_member_kelas','booking_kelas.ID_BOOKING_KELAS','presensi_member_kelas.ID_PRESENSI_KELAS')
                    ->where('ID_BOOKING_KELAS','=',$id_booking_kelas)
                    ->update([
                        'STATUS_BOOKING_KELAS' => 'Cancel',
                        'SISA_MEMBER_KELAS' => DB::raw('SISA_MEMBER_KELAS + 1')
                    ]);

                DB::table('presensi_member_kelas')
                    ->where('ID_PRESENSI_KELAS','=',$id_booking_kelas)
                    ->delete();

                return response([
                    'message' => 'Berhasil membatalkan booking kelas',
                ], 200);
            } else {
                return response([
                    'message' => 'Maksimal pembatalan adalah H-1',
                    'data' => $maks_batal
                ], 401);
            }
        } else if($booking_kelas->STATUS_BOOKING_KELAS == 'Finish') {
            return response([
                'message' => 'Kelas sudah diikuti'
            ], 402);
        } else if($booking_kelas->STATUS_BOOKING_KELAS == 'Cancel') {
            return response([
                'message' => 'Kelas sudah dibatalkan sebelumnya'
            ], 403);
        }
    }
}