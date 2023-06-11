<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingGym;
use App\Models\Gym;
use Validator;
use Illuminate\Support\Facades\DB;

class BookingGymController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel booking_gym
        $booking_gym = DB::table('booking_sesi_gym')->get();
        if (count($booking_gym) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $booking_gym
            ], 200);
        } // return data semua booking_gym dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data booking_gym kosong
    }
    public function show($id_member) {
        $booking_gym = BookingGym::where('ID_MEMBER', $id_member)->get();

        if(!is_null($booking_gym)) {
            return response([
                'message' => 'Retrieve Booking Gym Success',
                'data' => $booking_gym
            ], 200);
        } // return data instruktur yang ditemukan dalam bentuk json

        return response([
            'message' => 'Booking Gym Not Found',
            'data' => null
        ], 404); // return message saat data instruktur tidak ditemukan
    }

    public function store(Request $request)
    { // untuk menambahkan data booking gym ke tabel booking_gym
      // serta menambahkan data presensi baru ke tabel presensi_member_gym
        $now = date('Y-m-d H:i:s');
        $year = date('y');
        $count = BookingGym::count() + 1;
        $month = date('m'); 
        
        $id_booking_gym = $year.'.'.$month.'.'.str_pad($count, 3, '0', STR_PAD_LEFT); // generate id 
        $id_gym = Gym::count() + 1;

        //mengambil data dari tabel member
        $member = DB::table('member')
            ->where('ID_MEMBER','=',$request->ID_MEMBER)
            ->first();
        //memeriksa status aktif member
        if(is_null($member)) {
            return response([
                'message' => 'Member Not Found',
                'data' => null,
            ], 400);
        }
        if($member->STATUS_MEMBER == 'Aktif') {
            //mengecek slot gym di tabel gym
            $gym = DB::table('gym')
                ->where('TANGGAL_GYM','=',$request->TGL_DIBOOKING)
                ->where('SESI_GYM','=',$request->SESI_GYM)
                ->first();
            //jika belum ada data gym yang sesuai
            //maka akan create data gym baru
            if(is_null($gym)) {
                $request->merge([
                    'ID_BOOKING_GYM' => $id_booking_gym,
                    'TGL_BOOKING_GYM' => $now,
                    'STATUS_BOOKING_GYM' => 'Booked',
                ]);
                $validate = Validator::make($request->all(), [
                    'ID_MEMBER' => 'required',
                    'TGL_BOOKING_GYM' => 'required',
                    'TGL_DIBOOKING' => 'required',
                    'SESI_GYM' => 'required',
                    'STATUS_BOOKING_GYM' => 'required',
                ]); // membuat rule validasi input
                if ($validate->fails()) {
                    return response(['message' => $validate->errors()], 400); // return error invalid input
                }

                $cek_booking_gym = DB::table('booking_sesi_gym')
                    ->where('ID_MEMBER','=',$request->ID_MEMBER)
                    ->where('TGL_DIBOOKING','=',$request->TGL_DIBOOKING)
                    ->whereIn('STATUS_BOOKING_GYM', ['Booked', 'Finish'])
                    ->first();
                // mengecek apakah sudah pernah booking gym pada hari yang sama
                if(is_null($cek_booking_gym)) {
                    //menambah data booking gym baru
                    $booking_gym = BookingGym::create($request->all());
            
                    //menambah data presensi gym baru
                    DB::table('presensi_member_gym')->insert([
                        'ID_PRESENSI_GYM' => $id_booking_gym,
                        'ID_MEMBER' => $booking_gym['ID_MEMBER'],
                        'WAKTU_PRESENSI_MEMBER_GYM' => NULL,
                    ]);
        
                    //menambah data gym baru
                    DB::table('gym')->insert([
                        'ID_GYM' => $id_gym,
                        'TANGGAL_GYM' => $booking_gym['TGL_DIBOOKING'],
                        'SESI_GYM' => $booking_gym['SESI_GYM'],
                        'SLOT' => 9
                    ]);
            
                    return response([
                        'message' => 'Berhasil menambahkan Booking Gym baru',
                        'data' => $booking_gym,
                    ], 200); // return data booking_gym baru dalam bentuk json
                }
                //jika sudah pernah booking maka akan menampilkan error
                return response([
                    'message' => 'Hanya boleh booking 1 sesi gym per hari',
                    'data' => $cek_booking_gym,
                ], 401);
            } else {
                //jika sudah ada maka akan di cek slot yang tersedia
                if($gym->SLOT > 0) {
                    $request->merge([
                        'ID_BOOKING_GYM' => $id_booking_gym,
                        'TGL_BOOKING_GYM' => $now,
                        'STATUS_BOOKING_GYM' => 'Booked',
                    ]);
                    $validate = Validator::make($request->all(), [
                        'ID_MEMBER' => 'required',
                        'TGL_BOOKING_GYM' => 'required',
                        'TGL_DIBOOKING' => 'required',
                        'SESI_GYM' => 'required',
                        'STATUS_BOOKING_GYM' => 'required',
                    ]); // membuat rule validasi input
                    if ($validate->fails()) {
                        return response(['message' => $validate->errors()], 400); // return error invalid input
                    }

                    $cek_booking_gym = DB::table('booking_sesi_gym')
                        ->where('ID_MEMBER','=',$request->ID_MEMBER)
                        ->where('TGL_DIBOOKING','=',$request->TGL_DIBOOKING)
                        ->where('STATUS_BOOKING_GYM','=','Booked')
                        ->first();
                    //mengecek apakah sudah pernah booking gym pada tanggal yang sama
                    if(is_null($cek_booking_gym)) {
                        //menambah data booking gym baru
                        $booking_gym = BookingGym::create($request->all());

                        //mengupdate data slot gym di database
                        DB::table('gym')
                            ->where('TANGGAL_GYM','=',$request->TGL_DIBOOKING)
                            ->where('SESI_GYM','=',$request->SESI_GYM)
                            ->update([
                                'SLOT' => DB::raw('SLOT - 1')
                            ]);
            
                        //menambah data presensi gym baru
                        DB::table('presensi_member_gym')->insert([
                            'ID_PRESENSI_GYM' => $id_booking_gym,
                            'ID_MEMBER' => $booking_gym['ID_MEMBER'],
                            'WAKTU_PRESENSI_MEMBER_GYM' => NULL,
                        ]);
                        
                        return response([
                            'message' => 'Berhasil menambahkan Booking Gym baru',
                            'data' => $booking_gym,
                        ], 200); // return data booking_gym baru dalam bentuk json

                    }
                    return response([
                        'message' => 'Hanya boleh booking 1 sesi gym per hari',
                        'data' => $cek_booking_gym,
                    ], 400);
                } else {
                    return response([
                        'message' => 'Slot Gym sudah penuh',
                        'data' => $gym,
                    ], 400); 
                }
            }
        } else {
            return response([
                'message' => 'Member Tidak Aktif, Gagal menambahkan Booking Gym baru',
                'data' => null,
            ], 200);
        }
    }

    public function cancelBooking(Request $request, $id_booking_gym) 
    { // untuk membatalkan booking gym
      // dengan ketentuan status booking masih booked
      // dan tanggal pembatalan < tanggal dibooking
        $date = date('Y-m-d');
        $time = date('H:i:s');

        $booking_gym = DB::table('booking_sesi_gym')->where('ID_BOOKING_GYM','=',$id_booking_gym)->first();

        // cek data booking berdasarkan id
        if(is_null($booking_gym)){
            return response([
                'message' => 'Booking Gym Not Found',
                'data' => null
            ], 404);
        }

        // cek apakah status booking masih booked
        if($booking_gym->STATUS_BOOKING_GYM == 'Booked') {
            // cek tanggal pembatalan max H-1 sebelum jadwal
            if($date < $booking_gym->TGL_DIBOOKING) {
                DB::table('booking_sesi_gym')
                    ->where('ID_BOOKING_GYM','=',$id_booking_gym)
                    ->update([
                        'STATUS_BOOKING_GYM' => 'Cancel'
                    ]);
                
                DB::table('presensi_member_gym')
                    ->where('ID_PRESENSI_GYM','=',$id_booking_gym)
                    ->delete();

                DB::table('gym')
                    ->where('TANGGAL_GYM','=',$booking_gym->TGL_DIBOOKING)
                    ->where('SESI_GYM','=',$booking_gym->SESI_GYM)
                    ->update([
                        'SLOT' => DB::raw('SLOT + 1')
                    ]);

                return response([
                    'message' => 'Berhasil Membatalkan Booking Gym',
                    'data' => $booking_gym,
                ], 200); // return data booking_gym baru dalam bentuk json
            } else {
                return response([
                    'message' => 'Gagal membatalkan booking, Waktu Booking Gym sudah lewat',
                    'data' => [
                        'Waktu Pembatalan = '.$date.' '.$time,
                        'Tanggal Dibooking = '.$booking_gym->TGL_DIBOOKING,
                        'Sesi = '.$booking_gym->SESI_GYM,
                    ],
                ], 400); 
            }
        } else if($booking_gym->STATUS_BOOKING_GYM == 'Finish') {
            return response([
                'message' => 'Gagal membatalkan booking, Sudah mengikuti gym',
                'data' => 'Status Booking = '.$booking_gym->STATUS_BOOKING_GYM,
            ], 400); 
        } else if($booking_gym->STATUS_BOOKING_GYM == 'Cancel'){
            return response([
                'message' => 'Sudah dibatalkan sebelumnya',
                'data' => null,
            ], 400); 
        }
    }
}