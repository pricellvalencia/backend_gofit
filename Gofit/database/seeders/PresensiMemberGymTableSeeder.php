<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PresensiMemberGymTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('presensi_member_gym')->delete();
        
        \DB::table('presensi_member_gym')->insert(array (
            0 => 
            array (
                'ID_PRESENSI_GYM' => '23.05.001',
                'ID_MEMBER' => '23.02.004',
                'WAKTU_PRESENSI_MEMBER_GYM' => '2023-05-19 20:02:39',
            ),
            1 => 
            array (
                'ID_PRESENSI_GYM' => '23.05.002',
                'ID_MEMBER' => '23.05.005',
                'WAKTU_PRESENSI_MEMBER_GYM' => '2023-05-19 19:03:10',
            ),
            2 => 
            array (
                'ID_PRESENSI_GYM' => '23.05.004',
                'ID_MEMBER' => '22.03.001',
                'WAKTU_PRESENSI_MEMBER_GYM' => '2023-05-21 12:02:01',
            ),
            3 => 
            array (
                'ID_PRESENSI_GYM' => '23.05.005',
                'ID_MEMBER' => '22.05.002',
                'WAKTU_PRESENSI_MEMBER_GYM' => '2023-05-22 18:28:04',
            ),
            4 => 
            array (
                'ID_PRESENSI_GYM' => '23.05.006',
                'ID_MEMBER' => '22.03.001',
                'WAKTU_PRESENSI_MEMBER_GYM' => '2023-05-23 17:29:03',
            ),
            5 => 
            array (
                'ID_PRESENSI_GYM' => '23.05.007',
                'ID_MEMBER' => '22.03.001',
                'WAKTU_PRESENSI_MEMBER_GYM' => NULL,
            ),
            6 => 
            array (
                'ID_PRESENSI_GYM' => '23.05.008',
                'ID_MEMBER' => '22.03.001',
                'WAKTU_PRESENSI_MEMBER_GYM' => NULL,
            ),
            7 => 
            array (
                'ID_PRESENSI_GYM' => '23.05.009',
                'ID_MEMBER' => '22.03.001',
                'WAKTU_PRESENSI_MEMBER_GYM' => NULL,
            ),
        ));
        
        
    }
}