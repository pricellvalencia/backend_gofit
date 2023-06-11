<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiAktivasi;
use Illuminate\Support\Facades\DB;
use Validator;

class TransaksiAktivasiController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel transaksi_aktivasi
        $transaksi_aktivasi = DB::table('transaksi_aktivasi')->
            join('pegawai','transaksi_aktivasi.ID_PEGAWAI','=','pegawai.ID_PEGAWAI')->
            join('member','transaksi_aktivasi.ID_MEMBER','=','member.ID_MEMBER')->
            get();

        if (count($transaksi_aktivasi) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $transaksi_aktivasi
            ], 200);
        } // return data semua transaksi_aktivasi dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data transaksi_aktivasi kosong
    }

    public function store(Request $request)
    { // untuk menambahkan data ke tabel transaksi_aktivasi
        {
            $year = date('y');
            $year1 = date('y') + 1;
            $running_number = TransaksiAktivasi::count() + 1; // get running transaksi_aktivasi numbern
            $month = date('m'); // get month of first registration
            $id_transaksi_aktivasi = $year.'.'.$month.'.'.str_pad($running_number, 3, '0', STR_PAD_LEFT); // generate id transaksi_aktivasi
    
            $request->merge([
                'ID_TRANSAKSI_AKTIVASI' => $id_transaksi_aktivasi,
                'TGL_TRANSAKSI_AKTIVASI' => date('Y-m-d H:i:s'),
                'MASA_BERLAKU_TRANSAKSI_AKTIVASI' => date($year1.'-m-d H:i:s'),
            ]);

            $storeData = $request->all();
            $validate = Validator::make($storeData, [
                'ID_TRANSAKSI_AKTIVASI' => 'required',
                'ID_PEGAWAI' => 'required',
                'ID_MEMBER' => 'required',
                'TGL_TRANSAKSI_AKTIVASI' => 'required',
                'MASA_BERLAKU_TRANSAKSI_AKTIVASI' => 'required',
                'JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI' => 'required',
            ]); // membuat rule validasi input
    
            if ($validate->fails()) 
                return response(['message' => $validate->errors()], 400); // return error invalid input
            
            $member = DB::table('member')
                        ->where('ID_MEMBER','=',$storeData['ID_MEMBER'])
                        ->first();
            
            if ($member->STATUS_MEMBER == 'Tidak Aktif') {
                $transaksi_aktivasi = TransaksiAktivasi::create($request->all());
                DB::table('member')
                    ->where('ID_MEMBER','=',$storeData['ID_MEMBER'])
                    ->update([
                        'STATUS_MEMBER' => 'Aktif',
                        'WAKTU_MULAI_AKTIVASI' => $storeData['TGL_TRANSAKSI_AKTIVASI'],
                        'WAKTU_AKTIVASI_EKSPIRED' => $storeData['MASA_BERLAKU_TRANSAKSI_AKTIVASI'],
                    ]);
                return response([
                    'message' => 'Berhasil menambahkan transaksi aktivasi baru',
                    'data' => $transaksi_aktivasi,
                ], 200); // return data transaksi_aktivasi baru dalam bentuk json
            } else {
                return response([
                    'message' => 'Gagal menambahkan aktivasi, Member ini sudah aktif [!]',
                    'data' => null,
                ], 400); // return gagal menmbahkan aktivasi karena member sudah aktif
            }
        }
    }

    public function destroy($id_transaksi_aktivasi)
    { // menghapus data di tabel transaksi_aktivasi berdasarkan id_transaksi_aktivasi
        $transaksi_aktivasi = TransaksiAktivasi::find($id_transaksi_aktivasi); // mencari data transaksi_aktivasi berdasarkan id_transaksi_aktivasi

        if (is_null($transaksi_aktivasi)) {
            return response([
                'message' => 'Transaksi Aktivasi Not Found',
                'data' => null
            ], 404);
        } // return message saat data transaksi_aktivasi tidak ditemukan
        if (DB::table('transaksi_aktivasi')->where('ID_TRANSAKSI_AKTIVASI', $id_transaksi_aktivasi)->delete()) {
            return response([
                'message' => 'Delete Transaksi Aktivasi Success',
                'data' => $transaksi_aktivasi
            ], 200);
        } // return message saat berhasil menghapus data transaksi_aktivasi


        return response([
            'message' => 'Delete Transaksi Aktivasi Failed',
            'data' => null,
        ], 400); // return message saat gagal menghapus data member
    }
}
