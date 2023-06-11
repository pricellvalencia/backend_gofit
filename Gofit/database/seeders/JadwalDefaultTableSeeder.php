<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JadwalDefaultTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jadwal_default')->delete();
        
        \DB::table('jadwal_default')->insert(array (
            0 => 
            array (
                'ID_JADWAL_DEFAULT' => 1,
                'ID_INSTRUKTUR' => 4,
                'ID_KELAS' => 1,
                'SESI_JADWAL_DEFAULT' => '17:00',
                'HARI_JADWAL_DEFAULT' => 'Senin',
            ),
            1 => 
            array (
                'ID_JADWAL_DEFAULT' => 2,
                'ID_INSTRUKTUR' => 8,
                'ID_KELAS' => 9,
                'SESI_JADWAL_DEFAULT' => '18:30',
                'HARI_JADWAL_DEFAULT' => 'Selasa',
            ),
            2 => 
            array (
                'ID_JADWAL_DEFAULT' => 3,
                'ID_INSTRUKTUR' => 4,
                'ID_KELAS' => 3,
                'SESI_JADWAL_DEFAULT' => '17:00',
                'HARI_JADWAL_DEFAULT' => 'Rabu',
            ),
            3 => 
            array (
                'ID_JADWAL_DEFAULT' => 4,
                'ID_INSTRUKTUR' => 5,
                'ID_KELAS' => 4,
                'SESI_JADWAL_DEFAULT' => '09:30',
                'HARI_JADWAL_DEFAULT' => 'Kamis',
            ),
            4 => 
            array (
                'ID_JADWAL_DEFAULT' => 5,
                'ID_INSTRUKTUR' => 9,
                'ID_KELAS' => 11,
                'SESI_JADWAL_DEFAULT' => '17:00',
                'HARI_JADWAL_DEFAULT' => 'Jumat',
            ),
            5 => 
            array (
                'ID_JADWAL_DEFAULT' => 6,
                'ID_INSTRUKTUR' => 6,
                'ID_KELAS' => 17,
                'SESI_JADWAL_DEFAULT' => '08:00',
                'HARI_JADWAL_DEFAULT' => 'Senin',
            ),
            6 => 
            array (
                'ID_JADWAL_DEFAULT' => 7,
                'ID_INSTRUKTUR' => 3,
                'ID_KELAS' => 10,
                'SESI_JADWAL_DEFAULT' => '17:00',
                'HARI_JADWAL_DEFAULT' => 'Senin',
            ),
            7 => 
            array (
                'ID_JADWAL_DEFAULT' => 8,
                'ID_INSTRUKTUR' => 6,
                'ID_KELAS' => 5,
                'SESI_JADWAL_DEFAULT' => '18:30',
                'HARI_JADWAL_DEFAULT' => 'Selasa',
            ),
            8 => 
            array (
                'ID_JADWAL_DEFAULT' => 9,
                'ID_INSTRUKTUR' => 5,
                'ID_KELAS' => 12,
                'SESI_JADWAL_DEFAULT' => '17:00',
                'HARI_JADWAL_DEFAULT' => 'Rabu',
            ),
            9 => 
            array (
                'ID_JADWAL_DEFAULT' => 10,
                'ID_INSTRUKTUR' => 7,
                'ID_KELAS' => 2,
                'SESI_JADWAL_DEFAULT' => '09:30',
                'HARI_JADWAL_DEFAULT' => 'Kamis',
            ),
            10 => 
            array (
                'ID_JADWAL_DEFAULT' => 11,
                'ID_INSTRUKTUR' => 3,
                'ID_KELAS' => 5,
                'SESI_JADWAL_DEFAULT' => '17:00',
                'HARI_JADWAL_DEFAULT' => 'Jumat',
            ),
            11 => 
            array (
                'ID_JADWAL_DEFAULT' => 12,
                'ID_INSTRUKTUR' => 1,
                'ID_KELAS' => 8,
                'SESI_JADWAL_DEFAULT' => '08:00',
                'HARI_JADWAL_DEFAULT' => 'Senin',
            ),
            12 => 
            array (
                'ID_JADWAL_DEFAULT' => 13,
                'ID_INSTRUKTUR' => 6,
                'ID_KELAS' => 1,
                'SESI_JADWAL_DEFAULT' => '17:00',
                'HARI_JADWAL_DEFAULT' => 'Senin',
            ),
            13 => 
            array (
                'ID_JADWAL_DEFAULT' => 14,
                'ID_INSTRUKTUR' => 2,
                'ID_KELAS' => 7,
                'SESI_JADWAL_DEFAULT' => '18:30',
                'HARI_JADWAL_DEFAULT' => 'Selasa',
            ),
            14 => 
            array (
                'ID_JADWAL_DEFAULT' => 15,
                'ID_INSTRUKTUR' => 8,
                'ID_KELAS' => 4,
                'SESI_JADWAL_DEFAULT' => '17:00',
                'HARI_JADWAL_DEFAULT' => 'Rabu',
            ),
            15 => 
            array (
                'ID_JADWAL_DEFAULT' => 16,
                'ID_INSTRUKTUR' => 11,
                'ID_KELAS' => 14,
                'SESI_JADWAL_DEFAULT' => '09:30',
                'HARI_JADWAL_DEFAULT' => 'Kamis',
            ),
            16 => 
            array (
                'ID_JADWAL_DEFAULT' => 17,
                'ID_INSTRUKTUR' => 5,
                'ID_KELAS' => 12,
                'SESI_JADWAL_DEFAULT' => '17:00',
                'HARI_JADWAL_DEFAULT' => 'Jumat',
            ),
            17 => 
            array (
                'ID_JADWAL_DEFAULT' => 18,
                'ID_INSTRUKTUR' => 4,
                'ID_KELAS' => 9,
                'SESI_JADWAL_DEFAULT' => '08:00',
                'HARI_JADWAL_DEFAULT' => 'Senin',
            ),
            18 => 
            array (
                'ID_JADWAL_DEFAULT' => 19,
                'ID_INSTRUKTUR' => 7,
                'ID_KELAS' => 6,
                'SESI_JADWAL_DEFAULT' => '14:00',
                'HARI_JADWAL_DEFAULT' => 'Jumat',
            ),
            19 => 
            array (
                'ID_JADWAL_DEFAULT' => 20,
                'ID_INSTRUKTUR' => 6,
                'ID_KELAS' => 13,
                'SESI_JADWAL_DEFAULT' => '14:00',
                'HARI_JADWAL_DEFAULT' => 'Sabtu',
            ),
            20 => 
            array (
                'ID_JADWAL_DEFAULT' => 21,
                'ID_INSTRUKTUR' => 4,
                'ID_KELAS' => 4,
                'SESI_JADWAL_DEFAULT' => '18:30',
                'HARI_JADWAL_DEFAULT' => 'Sabtu',
            ),
            21 => 
            array (
                'ID_JADWAL_DEFAULT' => 22,
                'ID_INSTRUKTUR' => 3,
                'ID_KELAS' => 10,
                'SESI_JADWAL_DEFAULT' => '15:30',
                'HARI_JADWAL_DEFAULT' => 'Minggu',
            ),
        ));
        
        
    }
}