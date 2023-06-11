<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::options('{any}', function () {
    return response('', 200)
        ->header('Access-Control-Allow-Methods', 'OPTIONS, GET, POST, PUT, DELETE')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
})->where('any', '.*');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Website
    //Admin
// Route::get('/promo', 'App\Http\Controllers\API\PromoController@index');
// Route::post('/promo', 'App\Http\Controllers\API\PromoController@store');
// Route::get('/promo/{id_promo}', 'App\Http\Controllers\API\PromoController@show');
// Route::put('/promo/{id_promo}', 'App\Http\Controllers\API\PromoController@update');
// Route::delete('/promo/{id_promo}', 'App\Http\Controllers\API\PromoController@destroy');

Route::get('/pegawai', 'App\Http\Controllers\API\PegawaiController@index');
Route::post('/pegawai', 'App\Http\Controllers\API\PegawaiController@store');
Route::get('/pegawai/{id_pegawai}', 'App\Http\Controllers\API\PegawaiController@show');
Route::put('/pegawai/{id_pegawai}', 'App\Http\Controllers\API\PegawaiController@update');
Route::delete('/pegawai/{id_pegawai}', 'App\Http\Controllers\API\PegawaiController@destroy');

Route::get('/instruktur', 'App\Http\Controllers\API\InstrukturController@index');
Route::post('/instruktur', 'App\Http\Controllers\API\InstrukturController@store');
Route::put('/instruktur/{id_instruktur}', 'App\Http\Controllers\API\InstrukturController@update');
Route::delete('/instruktur/{id_instruktur}', 'App\Http\Controllers\API\InstrukturController@destroy');

    //MO
Route::get('/kelas', 'App\Http\Controllers\API\KelasController@index');
Route::post('/kelas', 'App\Http\Controllers\API\KelasController@store');
Route::get('/kelas/{id_kelas}', 'App\Http\Controllers\API\KelasController@show');
Route::put('/kelas/{id_kelas}', 'App\Http\Controllers\API\KelasController@update');
Route::delete('/kelas/{id_kelas}', 'App\Http\Controllers\API\KelasController@destroy');

Route::get('/jadwal_default', 'App\Http\Controllers\API\JadwalDefaultController@index');
Route::post('/jadwal_default', 'App\Http\Controllers\API\JadwalDefaultController@store');
Route::get('/jadwal_default/{id_jadwal_default}', 'App\Http\Controllers\API\JadwalDefaultController@show');
Route::put('/jadwal_default/{id_jadwal_default}', 'App\Http\Controllers\API\JadwalDefaultController@update');
Route::delete('/jadwal_default/{id_jadwal_default}', 'App\Http\Controllers\API\JadwalDefaultController@destroy');

Route::get('/jadwal_harian', 'App\Http\Controllers\API\JadwalHarianController@index');
Route::post('/jadwal_harian', 'App\Http\Controllers\API\JadwalHarianController@generateJadwalHarian');
Route::put('/jadwal_harian/{id_jadwal_harian}', 'App\Http\Controllers\API\JadwalHarianController@liburKelas');

Route::get('/ijin_instruktur', 'App\Http\Controllers\API\IjinInstrukturController@index');
Route::put('/ijin_instruktur/{id_ijin_instruktur}', 'App\Http\Controllers\API\IjinInstrukturController@konfirmasi');

    //Kasir
Route::get('/member', 'App\Http\Controllers\API\MemberController@index');
Route::post('/member', 'App\Http\Controllers\API\MemberController@store');
Route::put('/member/{id_member}', 'App\Http\Controllers\API\MemberController@update');
Route::delete('/member/{id_member}', 'App\Http\Controllers\API\MemberController@destroy');
Route::post('/member/{id_member}', 'App\Http\Controllers\API\MemberController@resetPassword');

Route::get('/transaksi_aktivasi', 'App\Http\Controllers\API\TransaksiAktivasiController@index');
Route::post('/transaksi_aktivasi', 'App\Http\Controllers\API\TransaksiAktivasiController@store');
Route::delete('/transaksi_aktivasi/{id_transaksi_aktivasi}', 'App\Http\Controllers\API\TransaksiAktivasiController@destroy');

Route::get('/transaksi_deposit_uang', 'App\Http\Controllers\API\DepositUangController@index');
Route::post('/transaksi_deposit_uang', 'App\Http\Controllers\API\DepositUangController@store');
Route::delete('/transaksi_deposit_uang/{id_transaksi_deposit_uang}', 'App\Http\Controllers\API\DepositUangController@destroy');

Route::get('/transaksi_deposit_kelas', 'App\Http\Controllers\API\DepositKelasController@index');
Route::post('/transaksi_deposit_kelas', 'App\Http\Controllers\API\DepositKelasController@store');
Route::delete('/transaksi_deposit_kelas/{id_transaksi_deposit_kelas}', 'App\Http\Controllers\API\DepositKelasController@destroy');

Route::get('/presensi_gym', 'App\Http\Controllers\API\PresensiGymController@index');
Route::put('/presensi_gym/{id_presensi_gym}', 'App\Http\Controllers\API\PresensiGymController@presensi');

Route::get('/presensi_kelas', 'App\Http\Controllers\API\PresensiKelasController@index');

//Mobile
    //MO
Route::get('/presensi_instruktur', 'App\Http\Controllers\API\PresensiInstrukturController@showToday');
Route::put('/presensi_instruktur/mulai_kelas/{id_presensi_instruktur}', 'App\Http\Controllers\API\PresensiInstrukturController@startClass');
Route::put('/presensi_instruktur/selesai_kelas/{id_presensi_instruktur}', 'App\Http\Controllers\API\PresensiInstrukturController@endClass');

    //Instruktur
Route::get('/instruktur/{id_instruktur}', 'App\Http\Controllers\API\InstrukturController@show');

Route::post('/presensi_kelas', 'App\Http\Controllers\API\PresensiKelasController@cekPresensiInstruktur');
Route::get('/presensi_kelas/{id_jadwal_harian}','App\Http\Controllers\API\PresensiKelasController@listMember');
Route::put('/presensi_kelas/hadir','App\Http\Controllers\API\PresensiKelasController@presensiHadir');
Route::put('/presensi_kelas/alpa','App\Http\Controllers\API\PresensiKelasController@presensiAlpa');

Route::get('/ijin_instruktur/{id_instruktur}', 'App\Http\Controllers\API\IjinInstrukturController@getIjin');
Route::get('/ijin_instruktur/getJadwal/{id_instruktur}', 'App\Http\Controllers\API\IjinInstrukturController@getJadwal');
Route::post('/ijin_instruktur', 'App\Http\Controllers\API\IjinInstrukturController@ijin');

    //Member
Route::get('/member/{id_member}', 'App\Http\Controllers\API\MemberController@show');
Route::get('/paketKelas/{id_member}', 'App\Http\Controllers\API\MemberController@getPaketKelas');

Route::get('/booking_kelas', 'App\Http\Controllers\API\BookingKelasController@index');
Route::get('/booking_kelas/getJadwal', 'App\Http\Controllers\API\BookingKelasController@getJadwal');
Route::get('/booking_kelas/{id_member}', 'App\Http\Controllers\API\BookingKelasController@getData');
Route::post('/booking_kelas', 'App\Http\Controllers\API\BookingKelasController@store');
Route::put('/booking_kelas/{id_booking_kelas}', 'App\Http\Controllers\API\BookingKelasController@batalBooking');

Route::get('/booking_gym', 'App\Http\Controllers\API\BookingGymController@index');
Route::post('/booking_gym', 'App\Http\Controllers\API\BookingGymController@store');
Route::put('/booking_gym/{id_booking_gym}', 'App\Http\Controllers\API\BookingGymController@cancelBooking');
Route::get('/booking_gym/{id_member}', 'App\Http\Controllers\API\BookingGymController@show');

//Login
Route::post('/login', 'App\Http\Controllers\API\AuthController@login');
Route::post('/loginMobile', 'App\Http\Controllers\API\AuthController@loginMobile');
Route::post('/update_password', 'App\Http\Controllers\API\AuthController@updatePassword');

//Sistem
Route::get('/exp', 'App\Http\Controllers\API\MemberController@showExpiredMembersToday');
Route::put('/exp', 'App\Http\Controllers\API\MemberController@deactivateExpiredMembers');
Route::put('/resetDeposit', 'App\Http\Controllers\API\DepositKelasController@resetKadaluarsa');

//Laporan
Route::post('/laporanPendapatan', 'App\Http\Controllers\API\LaporanController@laporanPendapatan');
Route::post('/laporanKelas', 'App\Http\Controllers\API\LaporanController@laporanKelas');
Route::post('/laporanGym', 'App\Http\Controllers\API\LaporanController@laporanGym');
Route::post('/laporanKinerja', 'App\Http\Controllers\API\LaporanController@laporanKinerja');

//History Member
Route::get('/getBookingKelas/{id_member}', 'App\Http\Controllers\API\HistoryMemberController@getBookingKelas');
Route::get('/getBookingGym/{id_member}', 'App\Http\Controllers\API\HistoryMemberController@getBookingGym');

//History instruktur
Route::get('/getHistory/{id_instruktur}','App\Http\Controllers\API\HistoryInstrukturController@getHistory');