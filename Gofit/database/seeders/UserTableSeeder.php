<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user')->delete();
        
        \DB::table('user')->insert(array (
            0 => 
            array (
                'id_user' => '1',
                'password' => '12345',
                'role' => 'instruktur',
            ),
            1 => 
            array (
                'id_user' => '10',
                'password' => '12345',
                'role' => 'instruktur',
            ),
            2 => 
            array (
                'id_user' => '11',
                'password' => '12345',
                'role' => 'instruktur',
            ),
            3 => 
            array (
                'id_user' => '2',
                'password' => '12345',
                'role' => 'instruktur',
            ),
            4 => 
            array (
                'id_user' => '22.03.001',
                'password' => '12345',
                'role' => 'member',
            ),
            5 => 
            array (
                'id_user' => '22.05.002',
                'password' => '12345',
                'role' => 'member',
            ),
            6 => 
            array (
                'id_user' => '22.05.003',
                'password' => '12345',
                'role' => 'member',
            ),
            7 => 
            array (
                'id_user' => '23.02.004',
                'password' => '12345',
                'role' => 'member',
            ),
            8 => 
            array (
                'id_user' => '23.05.005',
                'password' => '12345',
                'role' => 'member',
            ),
            9 => 
            array (
                'id_user' => '23.05.006',
                'password' => '12345',
                'role' => 'member',
            ),
            10 => 
            array (
                'id_user' => '23.06.007',
                'password' => '12345',
                'role' => 'member',
            ),
            11 => 
            array (
                'id_user' => '23.06.008',
                'password' => '12345',
                'role' => 'member',
            ),
            12 => 
            array (
                'id_user' => '23.06.009',
                'password' => '12345',
                'role' => 'member',
            ),
            13 => 
            array (
                'id_user' => '23.06.010',
                'password' => '12345',
                'role' => 'member',
            ),
            14 => 
            array (
                'id_user' => '23.06.011',
                'password' => '12345',
                'role' => 'member',
            ),
            15 => 
            array (
                'id_user' => '3',
                'password' => '12345',
                'role' => 'instruktur',
            ),
            16 => 
            array (
                'id_user' => '4',
                'password' => '12345',
                'role' => 'instruktur',
            ),
            17 => 
            array (
                'id_user' => '5',
                'password' => '12345',
                'role' => 'instruktur',
            ),
            18 => 
            array (
                'id_user' => '6',
                'password' => '12345',
                'role' => 'instruktur',
            ),
            19 => 
            array (
                'id_user' => '7',
                'password' => '12345',
                'role' => 'instruktur',
            ),
            20 => 
            array (
                'id_user' => '8',
                'password' => '12345',
                'role' => 'instruktur',
            ),
            21 => 
            array (
                'id_user' => '9',
                'password' => '12345',
                'role' => 'instruktur',
            ),
            22 => 
            array (
                'id_user' => 'angel@gmail.com',
                'password' => '12345',
                'role' => 'mo',
            ),
        ));
        
        
    }
}