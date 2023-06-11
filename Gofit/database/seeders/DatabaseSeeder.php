<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(KelasTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PegawaiTableSeeder::class);
        $this->call(GymTableSeeder::class);
        $this->call(InstrukturTableSeeder::class);
        $this->call(JadwalDefaultTableSeeder::class);
        $this->call(JadwalHarianTableSeeder::class);
        $this->call(IjinInstrukturTableSeeder::class);
        $this->call(MemberTableSeeder::class);
        $this->call(PresensiInstrukturTableSeeder::class);
        $this->call(PresensiMemberGymTableSeeder::class);
        $this->call(PresensiMemberKelasTableSeeder::class);
        $this->call(PromoTableSeeder::class);
        $this->call(TransaksiAktivasiTableSeeder::class);
        $this->call(DepositPaketKelasTableSeeder::class);
        $this->call(TransaksiDepositKelasTableSeeder::class);
        $this->call(BookingSesiGymTableSeeder::class);
        $this->call(BookingKelasTableSeeder::class);
        $this->call(TransaksiDepositUangTableSeeder::class);
    }
}
