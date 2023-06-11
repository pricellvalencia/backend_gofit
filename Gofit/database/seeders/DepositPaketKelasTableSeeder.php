<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepositPaketKelasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('deposit_paket_kelas')->delete();
        
        \DB::table('deposit_paket_kelas')->insert(array (
            0 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK001',
                'ID_KELAS' => 9,
                'ID_MEMBER' => '22.03.001',
                'DEPOSIT_PAKET_KELAS' => 5,
                'TGL_KADALUARSA' => '2023-06-21',
            ),
            1 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK002',
                'ID_KELAS' => 8,
                'ID_MEMBER' => '22.05.002',
                'DEPOSIT_PAKET_KELAS' => 6,
                'TGL_KADALUARSA' => '2023-07-09',
            ),
            2 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK003',
                'ID_KELAS' => 17,
                'ID_MEMBER' => '22.05.002',
                'DEPOSIT_PAKET_KELAS' => 0,
                'TGL_KADALUARSA' => '2023-05-16',
            ),
            3 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK004',
                'ID_KELAS' => 14,
                'ID_MEMBER' => '22.05.003',
                'DEPOSIT_PAKET_KELAS' => 13,
                'TGL_KADALUARSA' => '2023-07-16',
            ),
            4 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK005',
                'ID_KELAS' => 13,
                'ID_MEMBER' => '23.05.005',
                'DEPOSIT_PAKET_KELAS' => 6,
                'TGL_KADALUARSA' => '2023-06-18',
            ),
            5 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK006',
                'ID_KELAS' => 11,
                'ID_MEMBER' => '22.03.001',
                'DEPOSIT_PAKET_KELAS' => 6,
                'TGL_KADALUARSA' => '2023-07-05',
            ),
            6 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK007',
                'ID_KELAS' => 9,
                'ID_MEMBER' => '23.05.006',
                'DEPOSIT_PAKET_KELAS' => 5,
                'TGL_KADALUARSA' => '2023-07-10',
            ),
            7 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK008',
                'ID_KELAS' => 9,
                'ID_MEMBER' => '23.06.007',
                'DEPOSIT_PAKET_KELAS' => 12,
                'TGL_KADALUARSA' => '2023-08-10',
            ),
            8 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK009',
                'ID_KELAS' => 3,
                'ID_MEMBER' => '23.05.006',
                'DEPOSIT_PAKET_KELAS' => 5,
                'TGL_KADALUARSA' => '2023-07-10',
            ),
            9 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK010',
                'ID_KELAS' => 10,
                'ID_MEMBER' => '22.03.001',
                'DEPOSIT_PAKET_KELAS' => 6,
                'TGL_KADALUARSA' => '2023-07-10',
            ),
            10 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK011',
                'ID_KELAS' => 10,
                'ID_MEMBER' => '23.06.008',
                'DEPOSIT_PAKET_KELAS' => 6,
                'TGL_KADALUARSA' => '2023-07-10',
            ),
            11 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK012',
                'ID_KELAS' => 10,
                'ID_MEMBER' => '23.06.010',
                'DEPOSIT_PAKET_KELAS' => 13,
                'TGL_KADALUARSA' => '2023-08-10',
            ),
            12 => 
            array (
                'ID_DEPOSIT_PAKET_KELAS' => 'DPK013',
                'ID_KELAS' => 13,
                'ID_MEMBER' => '22.03.001',
                'DEPOSIT_PAKET_KELAS' => 6,
                'TGL_KADALUARSA' => '2023-07-10',
            ),
        ));
        
        
    }
}