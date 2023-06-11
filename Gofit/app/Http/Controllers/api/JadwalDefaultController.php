<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalDefault;
use Validator;
use Illuminate\Support\Facades\DB;

class JadwalDefaultController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel jadwal_default
        $jadwal_default = DB::table('jadwal_default')
            ->join('instruktur','jadwal_default.ID_INSTRUKTUR','=','instruktur.ID_INSTRUKTUR')
            ->join('kelas','jadwal_default.ID_KELAS','=','kelas.ID_KELAS')
            ->orderBy('ID_JADWAL_DEFAULT')
            ->get();

        if (count($jadwal_default) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $jadwal_default
            ], 200);
        } // return data semua jadwal_default dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data jadwal_default kosong
    }

    public function store(Request $request)
    { // untuk menambahkan data ke tabel jadwal_default
        {
            $count = JadwalDefault::count();
            $request->merge([
                'ID_JADWAL_DEFAULT' => $count + 1
            ]);

            $storeData = $request->all();
            $validate = Validator::make($storeData, [
                'ID_JADWAL_DEFAULT' => 'required',
                'ID_INSTRUKTUR' => 'required',
                'ID_KELAS' => 'required',
                'SESI_JADWAL_DEFAULT' => 'required',
                'HARI_JADWAL_DEFAULT' => 'required',
            ]); // membuat rule validasi input
            if ($validate->fails()) 
                return response(['message' => $validate->errors()], 400); // return error invalid input
            
            // mengecek jadwal instruktur untuk menghindari tabrakan
            $checkJadwalInstruktur = JadwalDefault::where('ID_INSTRUKTUR', $storeData['ID_INSTRUKTUR'])
                ->where('HARI_JADWAL_DEFAULT', $storeData['HARI_JADWAL_DEFAULT'])
                ->where('SESI_JADWAL_DEFAULT', $storeData['SESI_JADWAL_DEFAULT'])
                ->first();

            if ($checkJadwalInstruktur) {
                return response()->json([
                    'success' => false,
                    'message' => 'Jadwal instruktur bertabrakan dengan jadwal yang sudah ada.'
                ], 409); // return error karena jadwal instruktur bertabrakan
            }

            $jadwal_default = JadwalDefault::create($request->all());
            return response([
                'message' => 'Add Jadwal Default Success',
                'data' => $jadwal_default,
            ], 200); // return data jadwal_default baru dalam bentuk json
        }
    }

    public function show($id_jadwal_default)
    { // untuk menampilkan data di tabel jadwal_default berdasarkan id_jadwal_default
        $jadwal_default = JadwalDefault::find($id_jadwal_default); // mencari data jadwal_default berdasarkan id_jadwal_default

        if(!is_null($jadwal_default)) {
            return response([
                'message' => 'Show Jadwal Default Success',
                'data' => $jadwal_default
            ], 200);
        } // return data jadwal_default yang ditemukan dalam bentuk json

        return response([
            'message' => 'Jadwal Default Not Found',
            'data' => null
        ], 404); // return message saat data jadwal_default tidak ditemukan
    }

    public function update(Request $request, $id_jadwal_default) 
    { // untuk mengupdate data di tabel jadwal_default berdasarkan id_jadwal_default
        $jadwal_default = JadwalDefault::where('ID_JADWAL_DEFAULT', '=', $id_jadwal_default)->first(); //  Mengambil data paket berdasarkan id

        if(is_null($jadwal_default)){
            return response([
                'message' => 'Jadwal Default Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all(); // Mengambil seluruh data input dan menyimpan dalam variabel updateData
        $validate = Validator::make($updateData, [
            'ID_INSTRUKTUR' => 'required',
            'ID_KELAS' => 'required',
            'SESI_JADWAL_DEFAULT' => 'required',
            'HARI_JADWAL_DEFAULT' => 'required',
        ]);
        if($validate->fails())
            return response(['message' => $validate->errors()], 400); // return error invalid input
        
        // mengecek jadwal instruktur untuk menghindari tabrakan
        $checkJadwalInstruktur = JadwalDefault::where('ID_INSTRUKTUR', $updateData['ID_INSTRUKTUR'])
                ->where('HARI_JADWAL_DEFAULT', $updateData['HARI_JADWAL_DEFAULT'])
                ->where('SESI_JADWAL_DEFAULT', $updateData['SESI_JADWAL_DEFAULT'])
                ->first();

        if ($checkJadwalInstruktur) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal instruktur bertabrakan dengan jadwal yang sudah ada.'
            ], 409); // return error karena jadwal instruktur bertabrakan
        }
        
        if(DB::update('update jadwal_default set ID_INSTRUKTUR = ?, ID_KELAS = ?, SESI_JADWAL_DEFAULT =?, HARI_JADWAL_DEFAULT =? where ID_JADWAL_DEFAULT = ?',
            [$request->ID_INSTRUKTUR, $request-> ID_KELAS, $request-> SESI_JADWAL_DEFAULT, $request-> HARI_JADWAL_DEFAULT, $id_jadwal_default]))
        {
            $jadwal_default = JadwalDefault::where('ID_JADWAL_DEFAULT', '=', $id_jadwal_default)->first(); //  Mengambil data paket berdasarkan id_jadwal_default
            return response([
                'message' => 'Update Jadwal Default Success',
                'data' => $jadwal_default,
            ], 200);
        }

        return response([
            'message' => 'Update Jadwal Default Failed',
            'data' => null,
        ], 400);
    }

    public function destroy($id_jadwal_default) 
    { // untuk menghapus data di tabel jadwal_default berdasarkan id_jadwal_default
        $jadwal_default = JadwalDefault::find($id_jadwal_default); // mencari data jadwal_default berdasarkan id_jadwal_default

        if (is_null($jadwal_default)) {
            return response([
                'message' => 'Jadwal Default Not Found',
                'data' => null
            ], 404);
        } // return message saat data jadwal_default tidak ditemukan
        if (DB::table('jadwal_default')->where('ID_JADWAL_DEFAULT', $id_jadwal_default)->delete()) {
            return response([
                'message' => 'Delete Jadwal Default Success',
                'data' => $jadwal_default
            ], 200);
        } // return message saat berhasil menghapus data jadwal_default

        return response([
            'message' => 'Delete Jadwal Default Failed',
            'data' => null,
        ], 400); // return message saat gagal menghapus data jadwal_default
    }
}
