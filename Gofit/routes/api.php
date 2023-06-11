<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your api!
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
// Route::get('/promo', 'App\Http\Controllers\api\PromoController@index');
// Route::post('/promo', 'App\Http\Controllers\api\PromoController@store');
// Route::get('/promo/{id_promo}', 'App\Http\Controllers\api\PromoController@show');
// Route::put('/promo/{id_promo}', 'App\Http\Controllers\api\PromoController@update');
// Route::delete('/promo/{id_promo}', 'App\Http\Controllers\api\PromoController@destroy');

Route::get('/pegawai', 'App\Http\Controllers\api\PegawaiController@index');
Route::post('/pegawai', 'App\Http\Controllers\api\PegawaiController@store');
Route::get('/pegawai/{id_pegawai}', 'App\Http\Controllers\api\PegawaiController@show');
Route::put('/pegawai/{id_pegawai}', 'App\Http\Controllers\api\PegawaiController@update');
Route::delete('/pegawai/{id_pegawai}', 'App\Http\Controllers\api\PegawaiController@destroy');

Route::get('/instruktur', 'App\Http\Controllers\api\InstrukturController@index');
Route::post('/instruktur', 'App\Http\Controllers\api\InstrukturController@store');
Route::put('/instruktur/{id_instruktur}', 'App\Http\Controllers\api\InstrukturController@update');
Route::delete('/instruktur/{id_instruktur}', 'App\Http\Controllers\api\InstrukturController@destroy');

    //MO
Route::get('/kelas', 'App\Http\Controllers\api\KelasController@index');
Route::post('/kelas', 'App\Http\Controllers\api\KelasController@store');
Route::get('/kelas/{id_kelas}', 'App\Http\Controllers\api\KelasController@show');
Route::put('/kelas/{id_kelas}', 'App\Http\Controllers\api\KelasController@update');
Route::delete('/kelas/{id_kelas}', 'App\Http\Controllers\api\KelasController@destroy');

Route::get('/jadwal_default', 'App\Http\Controllers\api\JadwalDefaultController@index');
Route::post('/jadwal_default', 'App\Http\Controllers\api\JadwalDefaultController@store');
Route::get('/jadwal_default/{id_jadwal_default}', 'App\Http\Controllers\api\JadwalDefaultController@show');
Route::put('/jadwal_default/{id_jadwal_default}', 'App\Http\Controllers\api\JadwalDefaultController@update');
Route::delete('/jadwal_default/{id_jadwal_default}', 'App\Http\Controllers\api\JadwalDefaultController@destroy');

Route::get('/jadwal_harian', 'App\Http\Controllers\api\JadwalHarianController@index');
Route::post('/jadwal_harian', 'App\Http\Controllers\api\JadwalHarianController@generateJadwalHarian');
Route::put('/jadwal_harian/{id_jadwal_harian}', 'App\Http\Controllers\api\JadwalHarianController@liburKelas');

Route::get('/ijin_instruktur', 'App\Http\Controllers\api\IjinInstrukturController@index');
Route::put('/ijin_instruktur/{id_ijin_instruktur}', 'App\Http\Controllers\api\IjinInstrukturController@konfirmasi');

    //Kasir
Route::get('/member', 'App\Http\Controllers\api\MemberController@index');
Route::post('/member', 'App\Http\Controllers\api\MemberController@store');
Route::put('/member/{id_member}', 'App\Http\Controllers\api\MemberController@update');
Route::delete('/member/{id_member}', 'App\Http\Controllers\api\MemberController@destroy');
Route::post('/member/{id_member}', 'App\Http\Controllers\api\MemberController@resetPassword');

Route::get('/transaksi_aktivasi', 'App\Http\Controllers\api\TransaksiAktivasiController@index');
Route::post('/transaksi_aktivasi', 'App\Http\Controllers\api\TransaksiAktivasiController@store');
Route::delete('/transaksi_aktivasi/{id_transaksi_aktivasi}', 'App\Http\Controllers\api\TransaksiAktivasiController@destroy');

Route::get('/transaksi_deposit_uang', 'App\Http\Controllers\api\DepositUangController@index');
Route::post('/transaksi_deposit_uang', 'App\Http\Controllers\api\DepositUangController@store');
Route::delete('/transaksi_deposit_uang/{id_transaksi_deposit_uang}', 'App\Http\Controllers\api\DepositUangController@destroy');

Route::get('/transaksi_deposit_kelas', 'App\Http\Controllers\api\DepositKelasController@index');
Route::post('/transaksi_deposit_kelas', 'App\Http\Controllers\api\DepositKelasController@store');
Route::delete('/transaksi_deposit_kelas/{id_transaksi_deposit_kelas}', 'App\Http\Controllers\api\DepositKelasController@destroy');

Route::get('/presensi_gym', 'App\Http\Controllers\api\PresensiGymController@index');
Route::put('/presensi_gym/{id_presensi_gym}', 'App\Http\Controllers\api\PresensiGymController@presensi');

Route::get('/presensi_kelas', 'App\Http\Controllers\api\PresensiKelasController@index');

//Mobile
    //MO
Route::get('/presensi_instruktur', 'App\Http\Controllers\api\PresensiInstrukturController@showToday');
Route::put('/presensi_instruktur/mulai_kelas/{id_presensi_instruktur}', 'App\Http\Controllers\api\PresensiInstrukturController@startClass');
Route::put('/presensi_instruktur/selesai_kelas/{id_presensi_instruktur}', 'App\Http\Controllers\api\PresensiInstrukturController@endClass');

    //Instruktur
Route::get('/instruktur/{id_instruktur}', 'App\Http\Controllers\api\InstrukturController@show');

Route::post('/presensi_kelas', 'App\Http\Controllers\api\PresensiKelasController@cekPresensiInstruktur');
Route::get('/presensi_kelas/{id_jadwal_harian}','App\Http\Controllers\api\PresensiKelasController@listMember');
Route::put('/presensi_kelas/hadir','App\Http\Controllers\api\PresensiKelasController@presensiHadir');
Route::put('/presensi_kelas/alpa','App\Http\Controllers\api\PresensiKelasController@presensiAlpa');

Route::get('/ijin_instruktur/{id_instruktur}', 'App\Http\Controllers\api\IjinInstrukturController@getIjin');
Route::get('/ijin_instruktur/getJadwal/{id_instruktur}', 'App\Http\Controllers\api\IjinInstrukturController@getJadwal');
Route::post('/ijin_instruktur', 'App\Http\Controllers\api\IjinInstrukturController@ijin');

    //Member
Route::get('/member/{id_member}', 'App\Http\Controllers\api\MemberController@show');
Route::get('/paketKelas/{id_member}', 'App\Http\Controllers\api\MemberController@getPaketKelas');

Route::get('/booking_kelas', 'App\Http\Controllers\api\BookingKelasController@index');
Route::get('/booking_kelas/getJadwal', 'App\Http\Controllers\api\BookingKelasController@getJadwal');
Route::get('/booking_kelas/{id_member}', 'App\Http\Controllers\api\BookingKelasController@getData');
Route::post('/booking_kelas', 'App\Http\Controllers\api\BookingKelasController@store');
Route::put('/booking_kelas/{id_booking_kelas}', 'App\Http\Controllers\api\BookingKelasController@batalBooking');

Route::get('/booking_gym', 'App\Http\Controllers\api\BookingGymController@index');
Route::post('/booking_gym', 'App\Http\Controllers\api\BookingGymController@store');
Route::put('/booking_gym/{id_booking_gym}', 'App\Http\Controllers\api\BookingGymController@cancelBooking');
Route::get('/booking_gym/{id_member}', 'App\Http\Controllers\api\BookingGymController@show');

//Login
Route::post('/login', 'App\Http\Controllers\api\AuthController@login');
Route::post('/loginMobile', 'App\Http\Controllers\api\AuthController@loginMobile');
Route::post('/update_password', 'App\Http\Controllers\api\AuthController@updatePassword');

//Sistem
Route::get('/exp', 'App\Http\Controllers\api\MemberController@showExpiredMembersToday');
Route::put('/exp', 'App\Http\Controllers\api\MemberController@deactivateExpiredMembers');
Route::put('/resetDeposit', 'App\Http\Controllers\api\DepositKelasController@resetKadaluarsa');

//Laporan
Route::post('/laporanPendapatan', 'App\Http\Controllers\api\LaporanController@laporanPendapatan');
Route::post('/laporanKelas', 'App\Http\Controllers\api\LaporanController@laporanKelas');
Route::post('/laporanGym', 'App\Http\Controllers\api\LaporanController@laporanGym');
Route::post('/laporanKinerja', 'App\Http\Controllers\api\LaporanController@laporanKinerja');

//History Member
Route::get('/getBookingKelas/{id_member}', 'App\Http\Controllers\api\HistoryMemberController@getBookingKelas');
Route::get('/getBookingGym/{id_member}', 'App\Http\Controllers\api\HistoryMemberController@getBookingGym');

//History instruktur
Route::get('/getHistory/{id_instruktur}','App\Http\Controllers\api\HistoryInstrukturController@getHistory');