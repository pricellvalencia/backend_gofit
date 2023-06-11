<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksiDepositKelasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transaksi_deposit_kelas')->delete();
        
        \DB::table('transaksi_deposit_kelas')->insert(array (
            0 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.03.001',
                'ID_PEGAWAI' => 'P002',
                'ID_MEMBER' => '22.03.001',
                'ID_KELAS' => 9,
                'ID_PROMO' => 2,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-03-15 00:58:07',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 5,
                'BONUS_DEPOSIT_KELAS' => 1,
                'TOTAL_PEMBAYARAN' => 1900000,
                'MASA_BERLAKU' => '2023-04-15',
            ),
            1 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.03.002',
                'ID_PEGAWAI' => 'P002',
                'ID_MEMBER' => '22.05.002',
                'ID_KELAS' => 8,
                'ID_PROMO' => 3,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-03-15 01:23:31',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 11,
                'BONUS_DEPOSIT_KELAS' => 3,
                'TOTAL_PEMBAYARAN' => 2200000,
                'MASA_BERLAKU' => '2023-05-15',
            ),
            2 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.04.003',
                'ID_PEGAWAI' => 'P002',
                'ID_MEMBER' => '22.05.002',
                'ID_KELAS' => 17,
                'ID_PROMO' => 2,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-04-16 13:10:41',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 5,
                'BONUS_DEPOSIT_KELAS' => 1,
                'TOTAL_PEMBAYARAN' => 750000,
                'MASA_BERLAKU' => '2023-05-16',
            ),
            3 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.05.004',
                'ID_PEGAWAI' => 'P002',
                'ID_MEMBER' => '22.05.003',
                'ID_KELAS' => 14,
                'ID_PROMO' => 3,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-05-16 13:11:16',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 10,
                'BONUS_DEPOSIT_KELAS' => 3,
                'TOTAL_PEMBAYARAN' => 2000000,
                'MASA_BERLAKU' => '2023-07-16',
            ),
            4 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.05.005',
                'ID_PEGAWAI' => 'P002',
                'ID_MEMBER' => '23.05.005',
                'ID_KELAS' => 13,
                'ID_PROMO' => 2,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-05-18 14:32:54',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 5,
                'BONUS_DEPOSIT_KELAS' => 1,
                'TOTAL_PEMBAYARAN' => 750000,
                'MASA_BERLAKU' => '2023-06-18',
            ),
            5 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.05.006',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '22.03.001',
                'ID_KELAS' => 9,
                'ID_PROMO' => 2,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-05-21 22:45:24',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 5,
                'BONUS_DEPOSIT_KELAS' => 1,
                'TOTAL_PEMBAYARAN' => 1900000,
                'MASA_BERLAKU' => '2023-06-21',
            ),
            6 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.06.007',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '22.03.001',
                'ID_KELAS' => 11,
                'ID_PROMO' => 2,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-06-06 16:59:00',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 5,
                'BONUS_DEPOSIT_KELAS' => 1,
                'TOTAL_PEMBAYARAN' => 750000,
                'MASA_BERLAKU' => '2023-07-05',
            ),
            7 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.06.008',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '22.05.002',
                'ID_KELAS' => 8,
                'ID_PROMO' => 2,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-06-10 16:06:18',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 5,
                'BONUS_DEPOSIT_KELAS' => 1,
                'TOTAL_PEMBAYARAN' => 1000000,
                'MASA_BERLAKU' => '2023-07-09',
            ),
            8 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.06.009',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '23.05.006',
                'ID_KELAS' => 9,
                'ID_PROMO' => 2,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-06-11 12:50:17',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 5,
                'BONUS_DEPOSIT_KELAS' => 1,
                'TOTAL_PEMBAYARAN' => 1900000,
                'MASA_BERLAKU' => '2023-07-10',
            ),
            9 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.06.010',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '23.06.007',
                'ID_KELAS' => 9,
                'ID_PROMO' => 3,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-06-11 13:07:19',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 10,
                'BONUS_DEPOSIT_KELAS' => 3,
                'TOTAL_PEMBAYARAN' => 3800000,
                'MASA_BERLAKU' => '2023-08-10',
            ),
            10 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.06.011',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '23.05.006',
                'ID_KELAS' => 3,
                'ID_PROMO' => 2,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-06-11 13:16:15',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 5,
                'BONUS_DEPOSIT_KELAS' => 1,
                'TOTAL_PEMBAYARAN' => 1500000,
                'MASA_BERLAKU' => '2023-07-10',
            ),
            11 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.06.012',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '22.03.001',
                'ID_KELAS' => 10,
                'ID_PROMO' => 2,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-06-11 14:15:09',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 5,
                'BONUS_DEPOSIT_KELAS' => 1,
                'TOTAL_PEMBAYARAN' => 1875000,
                'MASA_BERLAKU' => '2023-07-10',
            ),
            12 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.06.013',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '23.06.008',
                'ID_KELAS' => 10,
                'ID_PROMO' => 2,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-06-11 14:15:21',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 5,
                'BONUS_DEPOSIT_KELAS' => 1,
                'TOTAL_PEMBAYARAN' => 1875000,
                'MASA_BERLAKU' => '2023-07-10',
            ),
            13 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.06.014',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '23.06.010',
                'ID_KELAS' => 10,
                'ID_PROMO' => 3,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-06-11 14:15:33',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 10,
                'BONUS_DEPOSIT_KELAS' => 3,
                'TOTAL_PEMBAYARAN' => 3750000,
                'MASA_BERLAKU' => '2023-08-10',
            ),
            14 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.06.015',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '22.03.001',
                'ID_KELAS' => 9,
                'ID_PROMO' => 2,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-06-11 15:00:07',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 5,
                'BONUS_DEPOSIT_KELAS' => 1,
                'TOTAL_PEMBAYARAN' => 1900000,
                'MASA_BERLAKU' => '2023-07-10',
            ),
            15 => 
            array (
                'ID_TRANSAKSI_DEPOSIT_KELAS' => '23.06.016',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '22.03.001',
                'ID_KELAS' => 13,
                'ID_PROMO' => 2,
                'TGL_TRANSAKSI_DEPOSIT_KELAS' => '2023-06-11 15:13:16',
                'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 5,
                'BONUS_DEPOSIT_KELAS' => 1,
                'TOTAL_PEMBAYARAN' => 750000,
                'MASA_BERLAKU' => '2023-07-10',
            ),
        ));
        
        
    }
}