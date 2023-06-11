<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookingSesiGymTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('booking_sesi_gym')->delete();
        
        \DB::table('booking_sesi_gym')->insert(array (
            0 => 
            array (
                'ID_BOOKING_GYM' => '23.05.001',
                'ID_MEMBER' => '23.02.004',
                'TGL_BOOKING_GYM' => '2023-05-19 19:42:49',
                'TGL_DIBOOKING' => '2023-05-19',
                'SESI_GYM' => '19:00 - 21:00',
                'STATUS_BOOKING_GYM' => 'Finish',
            ),
            1 => 
            array (
                'ID_BOOKING_GYM' => '23.05.002',
                'ID_MEMBER' => '23.05.005',
                'TGL_BOOKING_GYM' => '2023-05-19 20:06:56',
                'TGL_DIBOOKING' => '2023-05-19',
                'SESI_GYM' => '19:00 - 21:00',
                'STATUS_BOOKING_GYM' => 'Finish',
            ),
            2 => 
            array (
                'ID_BOOKING_GYM' => '23.05.003',
                'ID_MEMBER' => '22.03.001',
                'TGL_BOOKING_GYM' => '2023-05-19 20:43:37',
                'TGL_DIBOOKING' => '2023-05-23',
                'SESI_GYM' => '19:00 - 21:00',
                'STATUS_BOOKING_GYM' => 'Cancel',
            ),
            3 => 
            array (
                'ID_BOOKING_GYM' => '23.05.004',
                'ID_MEMBER' => '22.03.001',
                'TGL_BOOKING_GYM' => '2023-05-21 11:58:35',
                'TGL_DIBOOKING' => '2023-05-21',
                'SESI_GYM' => '11:00 - 13:00',
                'STATUS_BOOKING_GYM' => 'Finish',
            ),
            4 => 
            array (
                'ID_BOOKING_GYM' => '23.05.005',
                'ID_MEMBER' => '22.05.002',
                'TGL_BOOKING_GYM' => '2023-05-22 02:23:08',
                'TGL_DIBOOKING' => '2023-05-22',
                'SESI_GYM' => '17:00 - 19:00',
                'STATUS_BOOKING_GYM' => 'Finish',
            ),
            5 => 
            array (
                'ID_BOOKING_GYM' => '23.05.006',
                'ID_MEMBER' => '22.03.001',
                'TGL_BOOKING_GYM' => '2023-05-22 15:45:00',
                'TGL_DIBOOKING' => '2023-05-23',
                'SESI_GYM' => '17:00 - 19:00',
                'STATUS_BOOKING_GYM' => 'Finish',
            ),
            6 => 
            array (
                'ID_BOOKING_GYM' => '23.05.007',
                'ID_MEMBER' => '22.03.001',
                'TGL_BOOKING_GYM' => '2023-05-22 15:46:01',
                'TGL_DIBOOKING' => '2023-05-24',
                'SESI_GYM' => '11:00 - 13:00',
                'STATUS_BOOKING_GYM' => 'Booked',
            ),
            7 => 
            array (
                'ID_BOOKING_GYM' => '23.05.008',
                'ID_MEMBER' => '22.03.001',
                'TGL_BOOKING_GYM' => '2023-05-22 17:37:52',
                'TGL_DIBOOKING' => '2023-05-25',
                'SESI_GYM' => '07:00 - 09:00',
                'STATUS_BOOKING_GYM' => 'Booked',
            ),
            8 => 
            array (
                'ID_BOOKING_GYM' => '23.05.009',
                'ID_MEMBER' => '22.03.001',
                'TGL_BOOKING_GYM' => '2023-05-22 18:26:43',
                'TGL_DIBOOKING' => '2023-05-26',
                'SESI_GYM' => '17:00 - 19:00',
                'STATUS_BOOKING_GYM' => 'Booked',
            ),
        ));
        
        
    }
}