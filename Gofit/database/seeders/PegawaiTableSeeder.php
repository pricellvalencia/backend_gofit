<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PegawaiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pegawai')->delete();
        
        \DB::table('pegawai')->insert(array (
            0 => 
            array (
                'ID_PEGAWAI' => 'P001',
                'NAMA_PEGAWAI' => 'Pricell',
                'ALAMAT' => 'Ktpang',
                'NO_TELP' => '0895123413',
                'ROLE' => 'kasir',
                'EMAIL' => 'pricell@gmail.com',
                'USERNAME' => NULL,
                'PASSWORD' => '12345',
            ),
            1 => 
            array (
                'ID_PEGAWAI' => 'P002',
                'NAMA_PEGAWAI' => 'Angel',
                'ALAMAT' => 'Ptk',
                'NO_TELP' => '0812313',
                'ROLE' => 'mo',
                'EMAIL' => 'angel@gmail.com',
                'USERNAME' => NULL,
                'PASSWORD' => '12345',
            ),
            2 => 
            array (
                'ID_PEGAWAI' => 'P003',
                'NAMA_PEGAWAI' => 'Admin',
                'ALAMAT' => 'DIY',
                'NO_TELP' => '0812313',
                'ROLE' => 'admin',
                'EMAIL' => 'admin@gmail.com',
                'USERNAME' => NULL,
                'PASSWORD' => '123abc',
            ),
        ));
        
        
    }
}