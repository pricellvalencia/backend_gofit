<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JadwalHarianTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jadwal_harian')->delete();
        
        \DB::table('jadwal_harian')->insert(array (
            0 => 
            array (
                'ID_JADWAL_HARIAN' => 169,
                'ID_JADWAL_DEFAULT' => 6,
                'ID_INSTRUKTUR' => 6,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-05-15 08:00:00',
            ),
            1 => 
            array (
                'ID_JADWAL_HARIAN' => 170,
                'ID_JADWAL_DEFAULT' => 1,
                'ID_INSTRUKTUR' => 4,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-05-15 17:00:00',
            ),
            2 => 
            array (
                'ID_JADWAL_HARIAN' => 171,
                'ID_JADWAL_DEFAULT' => 2,
                'ID_INSTRUKTUR' => 8,
                'STATUS_KELAS' => 'Selesai',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-05-16 18:30:00',
            ),
            3 => 
            array (
                'ID_JADWAL_HARIAN' => 172,
                'ID_JADWAL_DEFAULT' => 3,
                'ID_INSTRUKTUR' => 4,
                'STATUS_KELAS' => 'Selesai',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-05-17 17:00:00',
            ),
            4 => 
            array (
                'ID_JADWAL_HARIAN' => 173,
                'ID_JADWAL_DEFAULT' => 4,
                'ID_INSTRUKTUR' => 5,
                'STATUS_KELAS' => 'Selesai',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-05-18 09:30:00',
            ),
            5 => 
            array (
                'ID_JADWAL_HARIAN' => 174,
                'ID_JADWAL_DEFAULT' => 5,
                'ID_INSTRUKTUR' => 9,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-05-19 17:00:00',
            ),
            6 => 
            array (
                'ID_JADWAL_HARIAN' => 211,
                'ID_JADWAL_DEFAULT' => 12,
                'ID_INSTRUKTUR' => 1,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-05-22 08:00:00',
            ),
            7 => 
            array (
                'ID_JADWAL_HARIAN' => 212,
                'ID_JADWAL_DEFAULT' => 7,
                'ID_INSTRUKTUR' => 3,
                'STATUS_KELAS' => 'Selesai',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-05-22 17:00:00',
            ),
            8 => 
            array (
                'ID_JADWAL_HARIAN' => 213,
                'ID_JADWAL_DEFAULT' => 8,
                'ID_INSTRUKTUR' => 6,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-05-23 18:30:00',
            ),
            9 => 
            array (
                'ID_JADWAL_HARIAN' => 214,
                'ID_JADWAL_DEFAULT' => 9,
                'ID_INSTRUKTUR' => 5,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-05-24 17:00:00',
            ),
            10 => 
            array (
                'ID_JADWAL_HARIAN' => 215,
                'ID_JADWAL_DEFAULT' => 10,
                'ID_INSTRUKTUR' => 7,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-05-25 09:30:00',
            ),
            11 => 
            array (
                'ID_JADWAL_HARIAN' => 216,
                'ID_JADWAL_DEFAULT' => 11,
                'ID_INSTRUKTUR' => 3,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-05-26 17:00:00',
            ),
            12 => 
            array (
                'ID_JADWAL_HARIAN' => 217,
                'ID_JADWAL_DEFAULT' => 18,
                'ID_INSTRUKTUR' => 4,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-06-05 08:00:00',
            ),
            13 => 
            array (
                'ID_JADWAL_HARIAN' => 218,
                'ID_JADWAL_DEFAULT' => 13,
                'ID_INSTRUKTUR' => 6,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-06-05 17:00:00',
            ),
            14 => 
            array (
                'ID_JADWAL_HARIAN' => 219,
                'ID_JADWAL_DEFAULT' => 14,
                'ID_INSTRUKTUR' => 2,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-06-06 18:30:00',
            ),
            15 => 
            array (
                'ID_JADWAL_HARIAN' => 220,
                'ID_JADWAL_DEFAULT' => 15,
                'ID_INSTRUKTUR' => 8,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-06-07 17:00:00',
            ),
            16 => 
            array (
                'ID_JADWAL_HARIAN' => 221,
                'ID_JADWAL_DEFAULT' => 16,
                'ID_INSTRUKTUR' => 11,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-06-08 09:30:00',
            ),
            17 => 
            array (
                'ID_JADWAL_HARIAN' => 222,
                'ID_JADWAL_DEFAULT' => 19,
                'ID_INSTRUKTUR' => 7,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-06-09 14:00:00',
            ),
            18 => 
            array (
                'ID_JADWAL_HARIAN' => 223,
                'ID_JADWAL_DEFAULT' => 17,
                'ID_INSTRUKTUR' => 5,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-06-09 17:00:00',
            ),
            19 => 
            array (
                'ID_JADWAL_HARIAN' => 228,
                'ID_JADWAL_DEFAULT' => 20,
                'ID_INSTRUKTUR' => 6,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-06-10 14:00:00',
            ),
            20 => 
            array (
                'ID_JADWAL_HARIAN' => 229,
                'ID_JADWAL_DEFAULT' => 21,
                'ID_INSTRUKTUR' => 4,
                'STATUS_KELAS' => 'Libur',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-06-10 18:30:00',
            ),
            21 => 
            array (
                'ID_JADWAL_HARIAN' => 230,
                'ID_JADWAL_DEFAULT' => 22,
                'ID_INSTRUKTUR' => 3,
                'STATUS_KELAS' => 'Selesai',
                'SISA_MEMBER_KELAS' => 0,
                'TANGGAL' => '2023-06-11 15:30:00',
            ),
        ));
        
        
    }
}