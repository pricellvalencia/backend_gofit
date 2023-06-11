<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksiDepositUangTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transaksi_deposit_uang')->delete();
        
        \DB::table('transaksi_deposit_uang')->insert(array (
            0 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.05.001',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '23.02.004',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-05-21 23:00:43',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 1000000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 1000000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            1 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.05.002',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '22.03.001',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-05-29 13:01:13',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 500000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 500000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            2 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.06.003',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '22.05.002',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-06-11 12:00:43',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 3000000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 3000000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            3 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.06.004',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '22.03.001',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-06-11 12:01:20',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 5000000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 5220000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            4 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.06.005',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '23.05.005',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-06-11 12:01:56',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 2500000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 2500000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            5 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.06.006',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => 1,
                'ID_MEMBER' => '23.02.004',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-06-11 12:02:23',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 3500000,
                'BONUS_DEPOSIT_UANG' => 300000,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 4370000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            6 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.06.007',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '23.06.007',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-06-11 13:13:34',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 1500000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 1500000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            7 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.06.008',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '22.05.003',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-06-11 13:15:19',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 5000000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 5000000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            8 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.06.009',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '23.06.010',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-06-11 13:19:29',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 1000000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 1000000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            9 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.06.010',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '23.06.009',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-06-11 13:21:59',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 500000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 500000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            10 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.06.011',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '23.05.006',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-06-11 13:23:05',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 4000000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 4000000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            11 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.06.012',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '23.06.008',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-06-11 13:24:42',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 3000000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 3000000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            12 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.06.013',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '23.06.010',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-06-11 14:00:51',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 3000000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 3350000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
            13 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_UANG' => '23.06.014',
                'ID_PEGAWAI' => 'P001',
                'ID_PROMO' => NULL,
                'ID_MEMBER' => '23.06.009',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => '2023-06-11 14:01:13',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 2500000,
                'BONUS_DEPOSIT_UANG' => NULL,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => 2650000,
                'SISA_DEPOSIT_UANG' => NULL,
            ),
        ));
        
        
    }
}