<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GymTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gym')->delete();
        
        \DB::table('gym')->insert(array (
            0 => 
            array (
                'ID_GYM' => 1,
                'TANGGAL_GYM' => '2023-05-19',
                'SESI_GYM' => '19:00 - 21:00',
                'SLOT' => 8,
            ),
            1 => 
            array (
                'ID_GYM' => 2,
                'TANGGAL_GYM' => '2023-05-23',
                'SESI_GYM' => '19:00 - 21:00',
                'SLOT' => 10,
            ),
            2 => 
            array (
                'ID_GYM' => 3,
                'TANGGAL_GYM' => '2023-05-21',
                'SESI_GYM' => '11:00 - 13:00',
                'SLOT' => 9,
            ),
            3 => 
            array (
                'ID_GYM' => 4,
                'TANGGAL_GYM' => '2023-05-22',
                'SESI_GYM' => '17:00 - 19:00',
                'SLOT' => 9,
            ),
            4 => 
            array (
                'ID_GYM' => 5,
                'TANGGAL_GYM' => '2023-05-23',
                'SESI_GYM' => '17:00 - 19:00',
                'SLOT' => 9,
            ),
            5 => 
            array (
                'ID_GYM' => 6,
                'TANGGAL_GYM' => '2023-05-24',
                'SESI_GYM' => '11:00 - 13:00',
                'SLOT' => 9,
            ),
            6 => 
            array (
                'ID_GYM' => 7,
                'TANGGAL_GYM' => '2023-05-25',
                'SESI_GYM' => '07:00 - 09:00',
                'SLOT' => 9,
            ),
            7 => 
            array (
                'ID_GYM' => 8,
                'TANGGAL_GYM' => '2023-05-26',
                'SESI_GYM' => '17:00 - 19:00',
                'SLOT' => 9,
            ),
        ));
        
        
    }
}