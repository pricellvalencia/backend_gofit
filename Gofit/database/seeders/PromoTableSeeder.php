<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PromoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('promo')->delete();
        
        \DB::table('promo')->insert(array (
            0 => 
            array (
                'ID_PROMO' => 1,
                'NAMA_PROMO' => 'Promo A',
                'DESKRIPSI_PROMO' => 'Minimal pembelian 3.000.000 bonus 300.000',
                'WAKTU_MULAI_PROMO' => '2023-03-09 10:00:00',
                'WAKTU_SELESAI_PROMO' => '2024-04-15 23:59:59',
                'MINIMAL_PEMBELIAN' => 3000000,
                'BONUS' => 300000,
            ),
            1 => 
            array (
                'ID_PROMO' => 2,
                'NAMA_PROMO' => 'Promo B',
                'DESKRIPSI_PROMO' => 'Minimal pembelian 5 kelas bonus 1 kelas',
                'WAKTU_MULAI_PROMO' => '2023-03-11 08:00:00',
                'WAKTU_SELESAI_PROMO' => '2024-04-18 23:59:59',
                'MINIMAL_PEMBELIAN' => 5,
                'BONUS' => 1,
            ),
            2 => 
            array (
                'ID_PROMO' => 3,
                'NAMA_PROMO' => 'Promo C',
                'DESKRIPSI_PROMO' => 'Minimal pembelian 10 kelas bonus 3 kelas',
                'WAKTU_MULAI_PROMO' => '2023-03-12 12:00:00',
                'WAKTU_SELESAI_PROMO' => '2024-04-18 23:59:59',
                'MINIMAL_PEMBELIAN' => 10,
                'BONUS' => 3,
            ),
        ));
        
        
    }
}