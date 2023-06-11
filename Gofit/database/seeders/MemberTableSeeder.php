<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('member')->delete();
        
        \DB::table('member')->insert(array (
            0 => 
            array (
                'ID_MEMBER' => '22.03.001',
                'NAMA_MEMBER' => 'Michelle',
                'ALAMAT_MEMBER' => 'sidikalang',
                'TELEPON_MEMBER' => '081234567890',
                'TANGGAL_LAHIR_MEMBER' => '2023-05-08',
                'JUMLAH_DEPOSIT_UANG' => 4195000,
                'EMAIL' => 'michelle@gmail.com',
                'USERNAME_MEMBER' => NULL,
                'PASSWORD_MEMBER' => '12345',
                'WAKTU_MULAI_AKTIVASI' => '2022-05-01 16:26:18',
                'WAKTU_AKTIVASI_EKSPIRED' => '2023-05-01 00:00:00',
                'WAKTU_DAFTAR_MEMBER' => '2022-03-01 07:43:57',
                'STATUS_MEMBER' => 'Aktif',
            ),
            1 => 
            array (
                'ID_MEMBER' => '22.05.002',
                'NAMA_MEMBER' => 'Rihanna',
                'ALAMAT_MEMBER' => 'seturan',
                'TELEPON_MEMBER' => '081241445322',
                'TANGGAL_LAHIR_MEMBER' => '2023-05-09',
                'JUMLAH_DEPOSIT_UANG' => 1595000,
                'EMAIL' => 'rihanna@gmail.com',
                'USERNAME_MEMBER' => NULL,
                'PASSWORD_MEMBER' => '12345',
                'WAKTU_MULAI_AKTIVASI' => '2022-05-02 00:00:00',
                'WAKTU_AKTIVASI_EKSPIRED' => '2023-05-02 00:00:00',
                'WAKTU_DAFTAR_MEMBER' => '2022-05-02 17:45:34',
                'STATUS_MEMBER' => 'Aktif',
            ),
            2 => 
            array (
                'ID_MEMBER' => '22.05.003',
                'NAMA_MEMBER' => 'Michael',
                'ALAMAT_MEMBER' => 'medan',
                'TELEPON_MEMBER' => '08234234',
                'TANGGAL_LAHIR_MEMBER' => '2023-05-02',
                'JUMLAH_DEPOSIT_UANG' => 4350000,
                'EMAIL' => 'michael@gmail.com',
                'USERNAME_MEMBER' => NULL,
                'PASSWORD_MEMBER' => '12345',
                'WAKTU_MULAI_AKTIVASI' => '2022-05-16 10:28:48',
                'WAKTU_AKTIVASI_EKSPIRED' => '2023-05-16 10:28:48',
                'WAKTU_DAFTAR_MEMBER' => '2022-05-16 10:28:48',
                'STATUS_MEMBER' => 'Aktif',
            ),
            3 => 
            array (
                'ID_MEMBER' => '23.02.004',
                'NAMA_MEMBER' => 'Nathania',
                'ALAMAT_MEMBER' => 'kalimantan',
                'TELEPON_MEMBER' => '08342234',
                'TANGGAL_LAHIR_MEMBER' => '2022-09-05',
                'JUMLAH_DEPOSIT_UANG' => 3045000,
                'EMAIL' => 'nathania@gmail.com',
                'USERNAME_MEMBER' => NULL,
                'PASSWORD_MEMBER' => '12345',
                'WAKTU_MULAI_AKTIVASI' => '2023-02-17 18:12:06',
                'WAKTU_AKTIVASI_EKSPIRED' => '2024-02-16 18:12:06',
                'WAKTU_DAFTAR_MEMBER' => '2023-02-17 17:47:59',
                'STATUS_MEMBER' => 'Aktif',
            ),
            4 => 
            array (
                'ID_MEMBER' => '23.05.005',
                'NAMA_MEMBER' => 'Grace',
                'ALAMAT_MEMBER' => 'seturan',
                'TELEPON_MEMBER' => '083424234',
                'TANGGAL_LAHIR_MEMBER' => '2003-05-06',
                'JUMLAH_DEPOSIT_UANG' => 1470000,
                'EMAIL' => 'grace@gmail.com',
                'USERNAME_MEMBER' => NULL,
                'PASSWORD_MEMBER' => '12345',
                'WAKTU_MULAI_AKTIVASI' => '2023-05-18 11:40:50',
                'WAKTU_AKTIVASI_EKSPIRED' => '2024-05-17 11:40:50',
                'WAKTU_DAFTAR_MEMBER' => '2023-05-17 17:48:42',
                'STATUS_MEMBER' => 'Aktif',
            ),
            5 => 
            array (
                'ID_MEMBER' => '23.05.006',
                'NAMA_MEMBER' => 'Robert',
                'ALAMAT_MEMBER' => 'pekanBaru',
                'TELEPON_MEMBER' => '085465345',
                'TANGGAL_LAHIR_MEMBER' => '2023-05-22',
                'JUMLAH_DEPOSIT_UANG' => 3650000,
                'EMAIL' => 'robert@gmail.com',
                'USERNAME_MEMBER' => NULL,
                'PASSWORD_MEMBER' => '12345',
                'WAKTU_MULAI_AKTIVASI' => '2023-06-10 15:54:07',
                'WAKTU_AKTIVASI_EKSPIRED' => '2024-06-10 15:54:07',
                'WAKTU_DAFTAR_MEMBER' => '2023-05-17 17:49:15',
                'STATUS_MEMBER' => 'Aktif',
            ),
            6 => 
            array (
                'ID_MEMBER' => '23.06.007',
                'NAMA_MEMBER' => 'Valencia',
                'ALAMAT_MEMBER' => 'Pawan 1',
                'TELEPON_MEMBER' => '08951384729',
                'TANGGAL_LAHIR_MEMBER' => '2001-03-23',
                'JUMLAH_DEPOSIT_UANG' => 475000,
                'EMAIL' => 'valencia1@gmail.com',
                'USERNAME_MEMBER' => NULL,
                'PASSWORD_MEMBER' => '12345',
                'WAKTU_MULAI_AKTIVASI' => '2023-06-11 13:06:49',
                'WAKTU_AKTIVASI_EKSPIRED' => '2024-06-11 13:06:49',
                'WAKTU_DAFTAR_MEMBER' => '2023-06-11 12:38:19',
                'STATUS_MEMBER' => 'Aktif',
            ),
            7 => 
            array (
                'ID_MEMBER' => '23.06.008',
                'NAMA_MEMBER' => 'Minsoo',
                'ALAMAT_MEMBER' => 'Bandung',
                'TELEPON_MEMBER' => '08372848291',
                'TANGGAL_LAHIR_MEMBER' => '1997-07-16',
                'JUMLAH_DEPOSIT_UANG' => 2275000,
                'EMAIL' => 'minsoo@gmail.com',
                'USERNAME_MEMBER' => NULL,
                'PASSWORD_MEMBER' => '12345',
                'WAKTU_MULAI_AKTIVASI' => '2023-06-11 13:17:21',
                'WAKTU_AKTIVASI_EKSPIRED' => '2024-06-11 13:17:21',
                'WAKTU_DAFTAR_MEMBER' => '2023-06-11 12:46:16',
                'STATUS_MEMBER' => 'Aktif',
            ),
            8 => 
            array (
                'ID_MEMBER' => '23.06.009',
                'NAMA_MEMBER' => 'Richie',
                'ALAMAT_MEMBER' => 'Surakarta',
                'TELEPON_MEMBER' => '08127532983',
                'TANGGAL_LAHIR_MEMBER' => '2001-09-13',
                'JUMLAH_DEPOSIT_UANG' => 2275000,
                'EMAIL' => 'richie@gmail.com',
                'USERNAME_MEMBER' => NULL,
                'PASSWORD_MEMBER' => '12345',
                'WAKTU_MULAI_AKTIVASI' => '2023-06-11 13:17:49',
                'WAKTU_AKTIVASI_EKSPIRED' => '2024-06-11 13:17:49',
                'WAKTU_DAFTAR_MEMBER' => '2023-06-11 12:48:17',
                'STATUS_MEMBER' => 'Aktif',
            ),
            9 => 
            array (
                'ID_MEMBER' => '23.06.010',
                'NAMA_MEMBER' => 'Effendy',
                'ALAMAT_MEMBER' => 'Solo',
                'TELEPON_MEMBER' => '088814321913',
                'TANGGAL_LAHIR_MEMBER' => '2004-06-04',
                'JUMLAH_DEPOSIT_UANG' => 2975000,
                'EMAIL' => 'effendy@gmail.com',
                'USERNAME_MEMBER' => NULL,
                'PASSWORD_MEMBER' => '12345',
                'WAKTU_MULAI_AKTIVASI' => '2023-06-11 13:19:07',
                'WAKTU_AKTIVASI_EKSPIRED' => '2024-06-11 13:19:07',
                'WAKTU_DAFTAR_MEMBER' => '2023-06-11 13:18:55',
                'STATUS_MEMBER' => 'Aktif',
            ),
            10 => 
            array (
                'ID_MEMBER' => '23.06.011',
                'NAMA_MEMBER' => 'Gabriel',
                'ALAMAT_MEMBER' => 'Kalteng',
                'TELEPON_MEMBER' => '081832819723',
                'TANGGAL_LAHIR_MEMBER' => '2002-11-03',
                'JUMLAH_DEPOSIT_UANG' => 0,
                'EMAIL' => 'gabriel@gmail.com',
                'USERNAME_MEMBER' => NULL,
                'PASSWORD_MEMBER' => '12345',
                'WAKTU_MULAI_AKTIVASI' => NULL,
                'WAKTU_AKTIVASI_EKSPIRED' => NULL,
                'WAKTU_DAFTAR_MEMBER' => '2023-06-11 14:51:52',
                'STATUS_MEMBER' => 'Tidak Aktif',
            ),
        ));
        
        
    }
}