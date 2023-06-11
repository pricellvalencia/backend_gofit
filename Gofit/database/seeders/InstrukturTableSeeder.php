<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InstrukturTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('instruktur')->delete();
        
        \DB::table('instruktur')->insert(array (
            0 => 
            array (
                'ID_INSTRUKTUR' => 1,
                'NAMA_INSTRUKTUR' => 'Joon',
                'TANGGAL_LAHIR_INSTRUKTUR' => '2023-04-05',
                'ALAMAT_INSTRUKTUR' => 'Jl. Ahmad Yani No. 10',
                'EMAIL' => 'joon@gmail.com',
                'TELEPON_INSTRUKTUR' => '081234567890',
                'USERNAME_INSTRUKTUR' => 'joon001',
                'PASSWORD_INSTRUKTUR' => '12345',
                'KETERLAMBATAN' => NULL,
            ),
            1 => 
            array (
                'ID_INSTRUKTUR' => 2,
                'NAMA_INSTRUKTUR' => 'JK',
                'TANGGAL_LAHIR_INSTRUKTUR' => '2023-04-18',
                'ALAMAT_INSTRUKTUR' => 'Jl. Sudirman No. 15',
                'EMAIL' => 'jk@gmail.com',
                'TELEPON_INSTRUKTUR' => '082345678901',
                'USERNAME_INSTRUKTUR' => 'jk123',
                'PASSWORD_INSTRUKTUR' => '12345',
                'KETERLAMBATAN' => 108,
            ),
            2 => 
            array (
                'ID_INSTRUKTUR' => 3,
                'NAMA_INSTRUKTUR' => 'Lisa',
                'TANGGAL_LAHIR_INSTRUKTUR' => '2023-04-11',
                'ALAMAT_INSTRUKTUR' => 'Jl. Diponegoro No. 20',
                'EMAIL' => 'lisa@gmail.com',
                'TELEPON_INSTRUKTUR' => '081111222333',
                'USERNAME_INSTRUKTUR' => 'lisa111',
                'PASSWORD_INSTRUKTUR' => '12345',
                'KETERLAMBATAN' => NULL,
            ),
            3 => 
            array (
                'ID_INSTRUKTUR' => 4,
                'NAMA_INSTRUKTUR' => 'Hobby',
                'TANGGAL_LAHIR_INSTRUKTUR' => '2023-04-17',
                'ALAMAT_INSTRUKTUR' => 'Jl. Pahlawan No. 25',
                'EMAIL' => 'hobby@gmail.com',
                'TELEPON_INSTRUKTUR' => '082222333444',
                'USERNAME_INSTRUKTUR' => 'hobby',
                'PASSWORD_INSTRUKTUR' => '12345',
                'KETERLAMBATAN' => NULL,
            ),
            4 => 
            array (
                'ID_INSTRUKTUR' => 5,
                'NAMA_INSTRUKTUR' => 'V',
                'TANGGAL_LAHIR_INSTRUKTUR' => '2023-04-10',
                'ALAMAT_INSTRUKTUR' => 'Jl. Merdeka No. 30',
                'EMAIL' => 'v@gmail.com',
                'TELEPON_INSTRUKTUR' => '081333444555',
                'USERNAME_INSTRUKTUR' => 'v1010',
                'PASSWORD_INSTRUKTUR' => '12345',
                'KETERLAMBATAN' => NULL,
            ),
            5 => 
            array (
                'ID_INSTRUKTUR' => 6,
                'NAMA_INSTRUKTUR' => 'Jenny',
                'TANGGAL_LAHIR_INSTRUKTUR' => '2023-04-10',
                'ALAMAT_INSTRUKTUR' => 'Jl. Gajah Mada No. 35',
                'EMAIL' => 'jenny@gmail.com',
                'TELEPON_INSTRUKTUR' => '082444555666',
                'USERNAME_INSTRUKTUR' => 'jenny000',
                'PASSWORD_INSTRUKTUR' => '12345',
                'KETERLAMBATAN' => NULL,
            ),
            6 => 
            array (
                'ID_INSTRUKTUR' => 7,
                'NAMA_INSTRUKTUR' => 'Rose',
                'TANGGAL_LAHIR_INSTRUKTUR' => '2023-05-08',
                'ALAMAT_INSTRUKTUR' => 'Jl. S Parman No. 239',
                'EMAIL' => 'rose@gmail.com',
                'TELEPON_INSTRUKTUR' => '082324',
                'USERNAME_INSTRUKTUR' => 'rose321',
                'PASSWORD_INSTRUKTUR' => '12345',
                'KETERLAMBATAN' => NULL,
            ),
            7 => 
            array (
                'ID_INSTRUKTUR' => 8,
                'NAMA_INSTRUKTUR' => 'Jisoo',
                'TANGGAL_LAHIR_INSTRUKTUR' => '2023-05-08',
                'ALAMAT_INSTRUKTUR' => 'Jl. Ketapang No. 201',
                'EMAIL' => 'jisoo@gmail.com',
                'TELEPON_INSTRUKTUR' => '076757567',
                'USERNAME_INSTRUKTUR' => 'jisoo1',
                'PASSWORD_INSTRUKTUR' => '12345',
                'KETERLAMBATAN' => 125,
            ),
            8 => 
            array (
                'ID_INSTRUKTUR' => 9,
                'NAMA_INSTRUKTUR' => 'Jimin',
                'TANGGAL_LAHIR_INSTRUKTUR' => '2023-05-09',
                'ALAMAT_INSTRUKTUR' => 'Jl. Sutomo No. 111',
                'EMAIL' => 'jimin@gmail.com',
                'TELEPON_INSTRUKTUR' => '08123231321',
                'USERNAME_INSTRUKTUR' => 'jimin999',
                'PASSWORD_INSTRUKTUR' => '12345',
                'KETERLAMBATAN' => NULL,
            ),
            9 => 
            array (
                'ID_INSTRUKTUR' => 10,
                'NAMA_INSTRUKTUR' => 'Suga',
                'TANGGAL_LAHIR_INSTRUKTUR' => '2023-05-14',
                'ALAMAT_INSTRUKTUR' => 'Jl. Pulang No. 1',
                'EMAIL' => 'suga@gmail.com',
                'TELEPON_INSTRUKTUR' => '0743242',
                'USERNAME_INSTRUKTUR' => 'suga9',
                'PASSWORD_INSTRUKTUR' => '12345',
                'KETERLAMBATAN' => NULL,
            ),
            10 => 
            array (
                'ID_INSTRUKTUR' => 11,
                'NAMA_INSTRUKTUR' => 'Jessi',
                'TANGGAL_LAHIR_INSTRUKTUR' => '2023-05-09',
                'ALAMAT_INSTRUKTUR' => 'Jl. Jalan Top 1',
                'EMAIL' => 'jessi@gmail.com',
                'TELEPON_INSTRUKTUR' => '094524525',
                'USERNAME_INSTRUKTUR' => 'jessi123',
                'PASSWORD_INSTRUKTUR' => '12345',
                'KETERLAMBATAN' => NULL,
            ),
        ));
        
        
    }
}