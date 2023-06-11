<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IjinInstrukturTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ijin_instruktur')->delete();
        
        \DB::table('ijin_instruktur')->insert(array (
            0 => 
            array (
                'ID_IJIN_INSTRUKTUR' => 1,
                'ID_INSTRUKTUR' => 6,
                'TANGGAL_PEMBUATAN_IJIN' => '2023-05-10 18:02:35',
                'TANGGAL_IJIN' => '2023-05-15 08:00:00',
                'STATUS_IJIN' => 'dikonfirmasi',
                'TGL_KONFIRMASI' => '2023-05-14 12:03:28',
                'ID_JADWAL_HARIAN' => 169,
                'KETERANGAN' => 'Covid',
                'ID_INSTRUKTUR_PENGGANTI' => NULL,
            ),
            1 => 
            array (
                'ID_IJIN_INSTRUKTUR' => 2,
                'ID_INSTRUKTUR' => 9,
                'TANGGAL_PEMBUATAN_IJIN' => '2023-05-11 09:25:45',
                'TANGGAL_IJIN' => '2023-05-17 17:00:00',
                'STATUS_IJIN' => 'dikonfirmasi',
                'TGL_KONFIRMASI' => '2023-05-14 12:03:28',
                'ID_JADWAL_HARIAN' => 172,
                'KETERANGAN' => 'Ada keluarga yang meninggal',
                'ID_INSTRUKTUR_PENGGANTI' => 4,
            ),
            2 => 
            array (
                'ID_IJIN_INSTRUKTUR' => 3,
                'ID_INSTRUKTUR' => 4,
                'TANGGAL_PEMBUATAN_IJIN' => '2023-05-14 22:02:35',
                'TANGGAL_IJIN' => '2023-05-15 17:00:00',
                'STATUS_IJIN' => 'dikonfirmasi',
                'TGL_KONFIRMASI' => '2023-05-14 12:03:28',
                'ID_JADWAL_HARIAN' => 170,
                'KETERANGAN' => 'Kebakaran rumah',
                'ID_INSTRUKTUR_PENGGANTI' => NULL,
            ),
            3 => 
            array (
                'ID_IJIN_INSTRUKTUR' => 4,
                'ID_INSTRUKTUR' => 9,
                'TANGGAL_PEMBUATAN_IJIN' => '2023-05-16 09:25:45',
                'TANGGAL_IJIN' => '2023-05-19 17:00:00',
                'STATUS_IJIN' => 'dikonfirmasi',
                'TGL_KONFIRMASI' => '2023-05-17 12:03:28',
                'ID_JADWAL_HARIAN' => 174,
                'KETERANGAN' => 'Masih berduka di kampung halaman',
                'ID_INSTRUKTUR_PENGGANTI' => NULL,
            ),
            4 => 
            array (
                'ID_IJIN_INSTRUKTUR' => 5,
                'ID_INSTRUKTUR' => 1,
                'TANGGAL_PEMBUATAN_IJIN' => '2023-05-21 20:03:11',
                'TANGGAL_IJIN' => '2023-05-22 08:00:00',
                'STATUS_IJIN' => 'dikonfirmasi',
                'TGL_KONFIRMASI' => '2023-05-22 06:32:01',
                'ID_JADWAL_HARIAN' => 211,
                'KETERANGAN' => 'Kecelakaan, masuk IGD',
                'ID_INSTRUKTUR_PENGGANTI' => NULL,
            ),
        ));
        
        
    }
}