<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PresensiMemberKelasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('presensi_member_kelas')->delete();
        
        \DB::table('presensi_member_kelas')->insert(array (
            0 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.001',
                'ID_JADWAL_HARIAN' => 171,
                'ID_MEMBER' => '22.03.001',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-16 18:33:00',
                'SISA_DEPOSIT' => 5,
                'EXP_DPK' => '2023-06-21 00:00:00',
            ),
            1 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.002',
                'ID_JADWAL_HARIAN' => 171,
                'ID_MEMBER' => '22.05.002',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-16 18:33:02',
                'SISA_DEPOSIT' => 2620000,
                'EXP_DPK' => NULL,
            ),
            2 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.003',
                'ID_JADWAL_HARIAN' => 171,
                'ID_MEMBER' => '23.05.005',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-16 18:33:05',
                'SISA_DEPOSIT' => 2120000,
                'EXP_DPK' => NULL,
            ),
            3 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.004',
                'ID_JADWAL_HARIAN' => 171,
                'ID_MEMBER' => '23.05.006',
                'WAKTU_PRESENSI_MEMBER_KELAS' => 'Tidak Hadir',
                'SISA_DEPOSIT' => 5,
                'EXP_DPK' => '2023-07-10 00:00:00',
            ),
            4 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.005',
                'ID_JADWAL_HARIAN' => 171,
                'ID_MEMBER' => '23.06.007',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-16 18:33:09',
                'SISA_DEPOSIT' => 12,
                'EXP_DPK' => '2023-08-10 00:00:00',
            ),
            5 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.006',
                'ID_JADWAL_HARIAN' => 172,
                'ID_MEMBER' => '23.06.007',
                'WAKTU_PRESENSI_MEMBER_KELAS' => 'Tidak Hadir',
                'SISA_DEPOSIT' => 1200000,
                'EXP_DPK' => NULL,
            ),
            6 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.007',
                'ID_JADWAL_HARIAN' => 172,
                'ID_MEMBER' => '23.02.004',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-17 17:01:59',
                'SISA_DEPOSIT' => 3770000,
                'EXP_DPK' => NULL,
            ),
            7 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.008',
                'ID_JADWAL_HARIAN' => 172,
                'ID_MEMBER' => '22.05.002',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-17 17:02:04',
                'SISA_DEPOSIT' => 2320000,
                'EXP_DPK' => NULL,
            ),
            8 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.009',
                'ID_JADWAL_HARIAN' => 172,
                'ID_MEMBER' => '23.05.005',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-17 17:02:07',
                'SISA_DEPOSIT' => 1820000,
                'EXP_DPK' => NULL,
            ),
            9 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.010',
                'ID_JADWAL_HARIAN' => 172,
                'ID_MEMBER' => '22.03.001',
                'WAKTU_PRESENSI_MEMBER_KELAS' => 'Tidak Hadir',
                'SISA_DEPOSIT' => 4920000,
                'EXP_DPK' => NULL,
            ),
            10 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.011',
                'ID_JADWAL_HARIAN' => 172,
                'ID_MEMBER' => '22.05.003',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-17 17:02:09',
                'SISA_DEPOSIT' => 4700000,
                'EXP_DPK' => NULL,
            ),
            11 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.012',
                'ID_JADWAL_HARIAN' => 172,
                'ID_MEMBER' => '23.05.006',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-17 17:02:12',
                'SISA_DEPOSIT' => 5,
                'EXP_DPK' => '2023-07-10 00:00:00',
            ),
            12 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.013',
                'ID_JADWAL_HARIAN' => 172,
                'ID_MEMBER' => '23.06.010',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-17 17:02:16',
                'SISA_DEPOSIT' => 700000,
                'EXP_DPK' => NULL,
            ),
            13 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.014',
                'ID_JADWAL_HARIAN' => 173,
                'ID_MEMBER' => '23.06.009',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-18 09:37:47',
                'SISA_DEPOSIT' => 150000,
                'EXP_DPK' => NULL,
            ),
            14 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.015',
                'ID_JADWAL_HARIAN' => 173,
                'ID_MEMBER' => '23.05.005',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-18 09:37:50',
                'SISA_DEPOSIT' => 1470000,
                'EXP_DPK' => NULL,
            ),
            15 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.016',
                'ID_JADWAL_HARIAN' => 173,
                'ID_MEMBER' => '23.06.007',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-18 09:37:52',
                'SISA_DEPOSIT' => 850000,
                'EXP_DPK' => NULL,
            ),
            16 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.017',
                'ID_JADWAL_HARIAN' => 173,
                'ID_MEMBER' => '23.05.006',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-18 09:37:54',
                'SISA_DEPOSIT' => 3650000,
                'EXP_DPK' => NULL,
            ),
            17 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.018',
                'ID_JADWAL_HARIAN' => 173,
                'ID_MEMBER' => '22.03.001',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-18 09:37:56',
                'SISA_DEPOSIT' => 4570000,
                'EXP_DPK' => NULL,
            ),
            18 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.019',
                'ID_JADWAL_HARIAN' => 173,
                'ID_MEMBER' => '22.05.003',
                'WAKTU_PRESENSI_MEMBER_KELAS' => 'Tidak Hadir',
                'SISA_DEPOSIT' => 4350000,
                'EXP_DPK' => NULL,
            ),
            19 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.020',
                'ID_JADWAL_HARIAN' => 173,
                'ID_MEMBER' => '23.06.010',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-18 09:37:58',
                'SISA_DEPOSIT' => 350000,
                'EXP_DPK' => NULL,
            ),
            20 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.021',
                'ID_JADWAL_HARIAN' => 173,
                'ID_MEMBER' => '23.06.008',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-18 09:38:00',
                'SISA_DEPOSIT' => 2650000,
                'EXP_DPK' => NULL,
            ),
            21 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.022',
                'ID_JADWAL_HARIAN' => 173,
                'ID_MEMBER' => '23.02.004',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-18 09:38:03',
                'SISA_DEPOSIT' => 3420000,
                'EXP_DPK' => NULL,
            ),
            22 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.023',
                'ID_JADWAL_HARIAN' => 173,
                'ID_MEMBER' => '22.05.002',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-18 09:38:07',
                'SISA_DEPOSIT' => 1970000,
                'EXP_DPK' => NULL,
            ),
            23 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.024',
                'ID_JADWAL_HARIAN' => 212,
                'ID_MEMBER' => '22.05.002',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-22 17:01:14',
                'SISA_DEPOSIT' => 1595000,
                'EXP_DPK' => NULL,
            ),
            24 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.025',
                'ID_JADWAL_HARIAN' => 212,
                'ID_MEMBER' => '22.03.001',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-22 17:01:17',
                'SISA_DEPOSIT' => 4195000,
                'EXP_DPK' => NULL,
            ),
            25 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.026',
                'ID_JADWAL_HARIAN' => 212,
                'ID_MEMBER' => '23.06.008',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-22 17:01:20',
                'SISA_DEPOSIT' => 2275000,
                'EXP_DPK' => NULL,
            ),
            26 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.027',
                'ID_JADWAL_HARIAN' => 212,
                'ID_MEMBER' => '23.02.004',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-22 17:01:22',
                'SISA_DEPOSIT' => 3045000,
                'EXP_DPK' => NULL,
            ),
            27 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.028',
                'ID_JADWAL_HARIAN' => 212,
                'ID_MEMBER' => '23.06.010',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-22 17:01:25',
                'SISA_DEPOSIT' => 2975000,
                'EXP_DPK' => NULL,
            ),
            28 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.029',
                'ID_JADWAL_HARIAN' => 212,
                'ID_MEMBER' => '23.06.009',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-22 17:01:27',
                'SISA_DEPOSIT' => 2275000,
                'EXP_DPK' => NULL,
            ),
            29 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.030',
                'ID_JADWAL_HARIAN' => 212,
                'ID_MEMBER' => '23.06.007',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-05-22 17:01:29',
                'SISA_DEPOSIT' => 475000,
                'EXP_DPK' => NULL,
            ),
            30 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.031',
                'ID_JADWAL_HARIAN' => 230,
                'ID_MEMBER' => '23.06.010',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-06-11 15:26:44',
                'SISA_DEPOSIT' => 13,
                'EXP_DPK' => '2023-08-10 00:00:00',
            ),
            31 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.032',
                'ID_JADWAL_HARIAN' => 230,
                'ID_MEMBER' => '22.03.001',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-06-11 15:26:44',
                'SISA_DEPOSIT' => 6,
                'EXP_DPK' => '2023-07-10 00:00:00',
            ),
            32 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.033',
                'ID_JADWAL_HARIAN' => 230,
                'ID_MEMBER' => '23.06.008',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-06-11 15:26:44',
                'SISA_DEPOSIT' => 6,
                'EXP_DPK' => '2023-07-10 00:00:00',
            ),
            33 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.034',
                'ID_JADWAL_HARIAN' => 230,
                'ID_MEMBER' => '23.06.007',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-06-11 15:26:44',
                'SISA_DEPOSIT' => 475000,
                'EXP_DPK' => NULL,
            ),
            34 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.035',
                'ID_JADWAL_HARIAN' => 230,
                'ID_MEMBER' => '23.06.009',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-06-11 15:26:44',
                'SISA_DEPOSIT' => 2275000,
                'EXP_DPK' => NULL,
            ),
            35 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.036',
                'ID_JADWAL_HARIAN' => 230,
                'ID_MEMBER' => '23.05.005',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-06-11 15:26:44',
                'SISA_DEPOSIT' => 1470000,
                'EXP_DPK' => NULL,
            ),
            36 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.037',
                'ID_JADWAL_HARIAN' => 230,
                'ID_MEMBER' => '22.05.003',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-06-11 15:26:44',
                'SISA_DEPOSIT' => 4350000,
                'EXP_DPK' => NULL,
            ),
            37 => 
            array (
                'ID_PRESENSI_KELAS' => '23.06.038',
                'ID_JADWAL_HARIAN' => 230,
                'ID_MEMBER' => '23.05.006',
                'WAKTU_PRESENSI_MEMBER_KELAS' => '2023-06-11 15:26:44',
                'SISA_DEPOSIT' => 3650000,
                'EXP_DPK' => NULL,
            ),
        ));
        
        
    }
}