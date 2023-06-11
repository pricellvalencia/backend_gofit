<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kelas')->delete();
        
        \DB::table('kelas')->insert(array (
            0 => 
            array (
                'ID_KELAS' => 1,
                'NAMA_KELAS' => 'Zumba',
                'HARGA_KELAS' => 150000,
            ),
            1 => 
            array (
                'ID_KELAS' => 2,
                'NAMA_KELAS' => 'Aerobik',
                'HARGA_KELAS' => 250000,
            ),
            2 => 
            array (
                'ID_KELAS' => 3,
                'NAMA_KELAS' => 'Body Combat',
                'HARGA_KELAS' => 300000,
            ),
            3 => 
            array (
                'ID_KELAS' => 4,
                'NAMA_KELAS' => 'Yoga',
                'HARGA_KELAS' => 350000,
            ),
            4 => 
            array (
                'ID_KELAS' => 5,
                'NAMA_KELAS' => 'Pilates',
                'HARGA_KELAS' => 375000,
            ),
            5 => 
            array (
                'ID_KELAS' => 6,
                'NAMA_KELAS' => 'Dance Fitness',
                'HARGA_KELAS' => 280000,
            ),
            6 => 
            array (
                'ID_KELAS' => 7,
                'NAMA_KELAS' => 'HIIT',
                'HARGA_KELAS' => 350000,
            ),
            7 => 
            array (
                'ID_KELAS' => 8,
                'NAMA_KELAS' => 'Stretching',
                'HARGA_KELAS' => 200000,
            ),
            8 => 
            array (
                'ID_KELAS' => 9,
                'NAMA_KELAS' => 'Functional Training',
                'HARGA_KELAS' => 380000,
            ),
            9 => 
            array (
                'ID_KELAS' => 10,
                'NAMA_KELAS' => 'Cardio Kickboxing',
                'HARGA_KELAS' => 375000,
            ),
            10 => 
            array (
                'ID_KELAS' => 11,
                'NAMA_KELAS' => 'Bellydance',
                'HARGA_KELAS' => 150000,
            ),
            11 => 
            array (
                'ID_KELAS' => 12,
                'NAMA_KELAS' => 'Pound Fit',
                'HARGA_KELAS' => 150000,
            ),
            12 => 
            array (
                'ID_KELAS' => 13,
                'NAMA_KELAS' => 'Trampoline Workout',
                'HARGA_KELAS' => 250000,
            ),
            13 => 
            array (
                'ID_KELAS' => 14,
                'NAMA_KELAS' => 'BUNGEE',
                'HARGA_KELAS' => 200000,
            ),
            14 => 
            array (
                'ID_KELAS' => 17,
                'NAMA_KELAS' => 'MUAYTHAI',
                'HARGA_KELAS' => 150000,
            ),
        ));
        
        
    }
}