<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksiAktivasiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transaksi_aktivasi')->delete();
        
        \DB::table('transaksi_aktivasi')->insert(array (
            0 => 
            array (
                'ID_TRANSAKSI_AKTIVASI' => '22.05.001',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '22.03.001',
                'TGL_TRANSAKSI_AKTIVASI' => '2022-05-01 16:26:18',
                'MASA_BERLAKU_TRANSAKSI_AKTIVASI' => '2023-05-01',
                'JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI' => 3000000,
            ),
            1 => 
            array (
                'ID_TRANSAKSI_AKTIVASI' => '22.05.002',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '22.05.002',
                'TGL_TRANSAKSI_AKTIVASI' => '2022-05-02 00:00:00',
                'MASA_BERLAKU_TRANSAKSI_AKTIVASI' => '2023-05-02',
                'JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI' => 3000000,
            ),
            2 => 
            array (
                'ID_TRANSAKSI_AKTIVASI' => '22.05.003',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '22.05.003',
                'TGL_TRANSAKSI_AKTIVASI' => '2022-05-16 10:28:48',
                'MASA_BERLAKU_TRANSAKSI_AKTIVASI' => '2023-05-16',
                'JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI' => 3000000,
            ),
            3 => 
            array (
                'ID_TRANSAKSI_AKTIVASI' => '23.02.004',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '23.02.004',
                'TGL_TRANSAKSI_AKTIVASI' => '2023-02-17 18:12:06',
                'MASA_BERLAKU_TRANSAKSI_AKTIVASI' => '2024-02-17',
                'JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI' => 3000000,
            ),
            4 => 
            array (
                'ID_TRANSAKSI_AKTIVASI' => '23.05.005',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '23.05.005',
                'TGL_TRANSAKSI_AKTIVASI' => '2023-05-18 11:40:50',
                'MASA_BERLAKU_TRANSAKSI_AKTIVASI' => '2024-05-18',
                'JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI' => 3000000,
            ),
            5 => 
            array (
                'ID_TRANSAKSI_AKTIVASI' => '23.06.006',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '23.05.006',
                'TGL_TRANSAKSI_AKTIVASI' => '2023-06-10 15:54:07',
                'MASA_BERLAKU_TRANSAKSI_AKTIVASI' => '2024-06-10',
                'JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI' => 3000000,
            ),
            6 => 
            array (
                'ID_TRANSAKSI_AKTIVASI' => '23.06.007',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '23.06.007',
                'TGL_TRANSAKSI_AKTIVASI' => '2023-06-11 13:06:49',
                'MASA_BERLAKU_TRANSAKSI_AKTIVASI' => '2024-06-11',
                'JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI' => 3000000,
            ),
            7 => 
            array (
                'ID_TRANSAKSI_AKTIVASI' => '23.06.008',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '23.06.008',
                'TGL_TRANSAKSI_AKTIVASI' => '2023-06-11 13:17:21',
                'MASA_BERLAKU_TRANSAKSI_AKTIVASI' => '2024-06-11',
                'JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI' => 3000000,
            ),
            8 => 
            array (
                'ID_TRANSAKSI_AKTIVASI' => '23.06.009',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '23.06.009',
                'TGL_TRANSAKSI_AKTIVASI' => '2023-06-11 13:17:49',
                'MASA_BERLAKU_TRANSAKSI_AKTIVASI' => '2024-06-11',
                'JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI' => 3000000,
            ),
            9 => 
            array (
                'ID_TRANSAKSI_AKTIVASI' => '23.06.010',
                'ID_PEGAWAI' => 'P001',
                'ID_MEMBER' => '23.06.010',
                'TGL_TRANSAKSI_AKTIVASI' => '2023-06-11 13:19:07',
                'MASA_BERLAKU_TRANSAKSI_AKTIVASI' => '2024-06-11',
                'JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI' => 3000000,
            ),
        ));
        
        
    }
}