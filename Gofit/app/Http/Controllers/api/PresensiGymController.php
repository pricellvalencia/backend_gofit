<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PresensiMemberGym;
use Validator;
use Illuminate\Support\Facades\DB;

class PresensiGymController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel presensi_member_gym
        $presensi_member_gym = DB::table('presensi_member_gym')
                    ->join('booking_sesi_gym','presensi_member_gym.ID_PRESENSI_GYM','=','booking_sesi_gym.ID_BOOKING_GYM')
                    ->join('member','presensi_member_gym.ID_MEMBER','=','member.ID_MEMBER')
                    ->get();
        if (count($presensi_member_gym) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $presensi_member_gym
            ], 200);
        } // return data semua presensi_member_gym dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data presensi_member_gym kosong
    }

    public function presensi(Request $request, $id_presensi_gym)
    { // untuk menambahkan tanggal presensi ke tabel presensi_gym
      // serta mengubah status booking di tabel booking_gym menjadi Finish
        $presensi_member_gym = PresensiMemberGym::where('ID_PRESENSI_GYM','=',$id_presensi_gym)->first();

        if(is_null($presensi_member_gym)){
            return response([
                'message' => 'Presensi Member Gym Not Found',
                'data' => null
            ], 404);
        }

        $date = date('Y-m-d');
        $time = date('H:i:s');
        $now = date('Y-m-d H:i:s');
        
        if($presensi_member_gym->WAKTU_PRESENSI_MEMBER_GYM == NULL) {
            $booking_gym = DB::table('booking_sesi_gym')
                    ->where('ID_BOOKING_GYM','=',$id_presensi_gym)
                    ->first();
            if($booking_gym->TGL_DIBOOKING == $date) {
                // echo "Waktu saat ini: " . $time . "\n";
                // echo "Sesi Gym: " . $booking_gym->SESI_GYM . "\n";
                if($booking_gym->SESI_GYM == "07:00 - 09:00" && $time >= '07:00:00' && $time < '09:00:00') {
                    DB::table('presensi_member_gym')
                        ->where('ID_PRESENSI_GYM','=',$id_presensi_gym)
                        ->update([
                            'WAKTU_PRESENSI_MEMBER_GYM' => $now
                        ]);

                    DB::table('booking_sesi_gym')
                        ->where('ID_BOOKING_GYM','=',$id_presensi_gym)
                        ->update([
                            'STATUS_BOOKING_GYM' => 'Finish'
                        ]);
                    
                    return response([
                        'message' => 'Berhasil Melakukan Presensi',
                        'data' => [
                            'ID_PRESENSI = '.$id_presensi_gym,
                            'ID_BOOKING ='.$booking_gym->ID_BOOKING_GYM,
                            'ID_MEMBER ='.$presensi_member_gym->ID_MEMBER,
                        ]
                    ], 200);
                } else if($booking_gym->SESI_GYM == "09:00 - 11:00" && $time >= '09:00:00' && $time < '11:00:00') {
                    DB::table('presensi_member_gym')
                        ->where('ID_PRESENSI_GYM','=',$id_presensi_gym)
                        ->update([
                            'WAKTU_PRESENSI_MEMBER_GYM' => $now
                        ]);

                    DB::table('booking_sesi_gym')
                        ->where('ID_BOOKING_GYM','=',$id_presensi_gym)
                        ->update([
                            'STATUS_BOOKING_GYM' => 'Finish'
                        ]);
                    
                    return response([
                        'message' => 'Berhasil Melakukan Presensi',
                        'data' => [
                            'ID_PRESENSI = '.$id_presensi_gym,
                            'ID_BOOKING ='.$booking_gym->ID_BOOKING_GYM,
                            'ID_MEMBER ='.$presensi_member_gym->ID_MEMBER,
                        ]
                    ], 200);
                } else if($booking_gym->SESI_GYM == "11:00 - 13:00" && $time >= '11:00:00' && $time < '13:00:00') {
                    DB::table('presensi_member_gym')
                        ->where('ID_PRESENSI_GYM','=',$id_presensi_gym)
                        ->update([
                            'WAKTU_PRESENSI_MEMBER_GYM' => $now
                        ]);

                    DB::table('booking_sesi_gym')
                        ->where('ID_BOOKING_GYM','=',$id_presensi_gym)
                        ->update([
                            'STATUS_BOOKING_GYM' => 'Finish'
                        ]);
                    
                    return response([
                        'message' => 'Berhasil Melakukan Presensi',
                        'data' => [
                            'ID_PRESENSI = '.$id_presensi_gym,
                            'ID_BOOKING ='.$booking_gym->ID_BOOKING_GYM,
                            'ID_MEMBER ='.$presensi_member_gym->ID_MEMBER,
                        ]
                    ], 200);
                } else if($booking_gym->SESI_GYM == "13:00 - 15:00" && $time >= '13:00:00' && $time < '15:00:00') {
                    DB::table('presensi_member_gym')
                        ->where('ID_PRESENSI_GYM','=',$id_presensi_gym)
                        ->update([
                            'WAKTU_PRESENSI_MEMBER_GYM' => $now
                        ]);

                    DB::table('booking_sesi_gym')
                        ->where('ID_BOOKING_GYM','=',$id_presensi_gym)
                        ->update([
                            'STATUS_BOOKING_GYM' => 'Finish'
                        ]);
                    
                    return response([
                        'message' => 'Berhasil Melakukan Presensi',
                        'data' => [
                            'ID_PRESENSI = '.$id_presensi_gym,
                            'ID_BOOKING ='.$booking_gym->ID_BOOKING_GYM,
                            'ID_MEMBER ='.$presensi_member_gym->ID_MEMBER,
                        ]
                    ], 200);
                } else if($booking_gym->SESI_GYM == "15:00 - 17:00" && $time >= '15:00:00' && $time < '17:00:00') {
                    DB::table('presensi_member_gym')
                        ->where('ID_PRESENSI_GYM','=',$id_presensi_gym)
                        ->update([
                            'WAKTU_PRESENSI_MEMBER_GYM' => $now
                        ]);

                    DB::table('booking_sesi_gym')
                        ->where('ID_BOOKING_GYM','=',$id_presensi_gym)
                        ->update([
                            'STATUS_BOOKING_GYM' => 'Finish'
                        ]);
                    
                    return response([
                        'message' => 'Berhasil Melakukan Presensi',
                        'data' => [
                            'ID_PRESENSI = '.$id_presensi_gym,
                            'ID_BOOKING ='.$booking_gym->ID_BOOKING_GYM,
                            'ID_MEMBER ='.$presensi_member_gym->ID_MEMBER,
                        ]
                    ], 200);
                } else if($booking_gym->SESI_GYM == "17:00 - 19:00" && $time >= '17:00:00' && $time < '19:00:00') {
                    DB::table('presensi_member_gym')
                        ->where('ID_PRESENSI_GYM','=',$id_presensi_gym)
                        ->update([
                            'WAKTU_PRESENSI_MEMBER_GYM' => $now
                        ]);

                    DB::table('booking_sesi_gym')
                        ->where('ID_BOOKING_GYM','=',$id_presensi_gym)
                        ->update([
                            'STATUS_BOOKING_GYM' => 'Finish'
                        ]);
                    
                    return response([
                        'message' => 'Berhasil Melakukan Presensi',
                        'data' => [
                            'ID_PRESENSI = '.$id_presensi_gym,
                            'ID_BOOKING ='.$booking_gym->ID_BOOKING_GYM,
                            'ID_MEMBER ='.$presensi_member_gym->ID_MEMBER,
                        ]
                    ], 200);
                } else if($booking_gym->SESI_GYM == "19:00 - 21:00" && $time >= '19:00:00' && $time < '21:00:00') {
                    DB::table('presensi_member_gym')
                        ->where('ID_PRESENSI_GYM','=',$id_presensi_gym)
                        ->update([
                            'WAKTU_PRESENSI_MEMBER_GYM' => $now
                        ]);

                    DB::table('booking_sesi_gym')
                        ->where('ID_BOOKING_GYM','=',$id_presensi_gym)
                        ->update([
                            'STATUS_BOOKING_GYM' => 'Finish'
                        ]);
                    
                    return response([
                        'message' => 'Berhasil Melakukan Presensi',
                        'data' => [
                            'ID_PRESENSI = '.$id_presensi_gym,
                            'ID_BOOKING ='.$booking_gym->ID_BOOKING_GYM,
                            'ID_MEMBER ='.$presensi_member_gym->ID_MEMBER,
                        ]
                    ], 200);
                // // ini untuk pengecekan
                // } else if($booking_gym->SESI_GYM == "23:00 - 23:59" && $time >= '23:00:00' && $time < '23:59:00') {
                //     DB::table('presensi_member_gym')
                //         ->where('ID_PRESENSI_GYM','=',$id_presensi_gym)
                //         ->update([
                //             'WAKTU_PRESENSI_MEMBER_GYM' => $now
                //         ]);

                //     DB::table('booking_sesi_gym')
                //         ->where('ID_BOOKING_GYM','=',$id_presensi_gym)
                //         ->update([
                //             'STATUS_BOOKING_GYM' => 'Finish'
                //         ]);
                    
                //     return response([
                //         'message' => 'Berhasil Melakukan Presensi',
                //         'data' => [
                //             'ID_PRESENSI = '.$id_presensi_gym,
                //             'ID_BOOKING ='.$booking_gym->ID_BOOKING_GYM,
                //             'ID_MEMBER ='.$presensi_member_gym->ID_MEMBER,
                //         ]
                //     ], 200);
                } else {
                    return response([
                        'message' => 'Sesi Gym tidak sesuai',
                        'data' => null
                    ], 400);
                }
            }
            return response([
                'message' => 'Tanggal Gym tidak sesuai',
                'data' => null
            ], 400);
        }
        return response([
            'message' => 'Sudah melakukan presensi',
            'data' => null
        ], 400);
    }
}