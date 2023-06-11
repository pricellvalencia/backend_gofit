<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instruktur;
use Validator;
use Illuminate\Support\Facades\DB;

class InstrukturController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel instruktur
        $instruktur = Instruktur::all();
        if (count($instruktur) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $instruktur
            ], 200);
        } // return data semua instruktur dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data instruktur kosong
    }

    public function store(Request $request)
    { // untuk menambahkan data ke tabel instruktur
        {
            $storeData = $request->all();
            $validate = Validator::make($storeData, [
                'NAMA_INSTRUKTUR' => 'required',
                'ALAMAT_INSTRUKTUR' => 'required',
                'TELEPON_INSTRUKTUR' => 'required|max:13',
                'TANGGAL_LAHIR_INSTRUKTUR' => 'required',
                'EMAIL_INSTRUKTUR' => 'required',
            ]); // membuat rule validasi input
    
            if ($validate->fails()) 
                return response(['message' => $validate->errors()], 400); // return error invalid input
    
            $instruktur = Instruktur::create($request->all());
            return response([
                'message' => 'Add Instruktur Success',
                'data' => $instruktur,
            ], 200); // return data instruktur baru dalam bentuk json
        }
    }

    public function show($id_instruktur)
    { // untuk menampilkan data di tabel instruktur berdasarkan id_instruktur
        $instruktur = Instruktur::find($id_instruktur); // mencari data instruktur berdasarkan id_instruktur

        if(!is_null($instruktur)) {
            return response([
                'message' => 'Show Instruktur Success',
                'data' => $instruktur
            ], 200);
        } // return data instruktur yang ditemukan dalam bentuk json

        return response([
            'message' => 'Instruktur Not Found',
            'data' => null
        ], 404); // return message saat data instruktur tidak ditemukan
    }

    public function update(Request $request, $id_instruktur) 
    { // untuk mengupdate data di tabel instruktur berdasarkan id_instruktur
        $instruktur = Instruktur::where('ID_INSTRUKTUR', '=', $id_instruktur)->first(); //  Mengambil data paket berdasarkan id

        if(is_null($instruktur)){
            return response([
                'message' => 'Instruktur Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all(); // Mengambil seluruh data input dan menyimpan dalam variabel updateData
        $validate = Validator::make($updateData, [
            'NAMA_INSTRUKTUR' => 'required',
            'ALAMAT_INSTRUKTUR' => 'required',
            'TELEPON_INSTRUKTUR' => 'required|max:13',
            'TANGGAL_LAHIR_INSTRUKTUR' => 'required',
            'EMAIL_INSTRUKTUR' => 'required',
        ]);

        if($validate->fails())
            return response(['message' => $validate->errors()], 400);

        if(DB::update('update instruktur set NAMA_INSTRUKTUR = ?, ALAMAT_INSTRUKTUR = ?, TELEPON_INSTRUKTUR =?, TANGGAL_LAHIR_INSTRUKTUR =?, EMAIL_INSTRUKTUR =? where ID_INSTRUKTUR = ?',
            [$request->NAMA_INSTRUKTUR, $request-> ALAMAT_INSTRUKTUR, $request-> TELEPON_INSTRUKTUR, $request->TANGGAL_LAHIR_INSTRUKTUR, $request-> EMAIL_INSTRUKTUR, $id_instruktur]))
        {
            $instruktur = Instruktur::where('ID_INSTRUKTUR', '=', $id_instruktur)->first(); //  Mengambil data paket berdasarkan id_instruktur

            return response([
                'message' => 'Update Instruktur Success',
                'data' => $instruktur,
            ], 200);
        }

        return response([
            'message' => 'Update Instruktur Failed',
            'data' => null,
        ], 400);
    }

    public function destroy($id_instruktur) 
    { // untuk menghapus data di tabel instruktur berdasarkan id_instruktur
        $instruktur = Instruktur::find($id_instruktur); // mencari data instruktur berdasarkan id_instruktur

        if (is_null($instruktur)) {
            return response([
                'message' => 'Instruktur Not Found',
                'data' => null
            ], 404);
        } // return message saat data instruktur tidak ditemukan
        if (DB::table('instruktur')->where('ID_INSTRUKTUR', $id_instruktur)->delete()) {
            return response([
                'message' => 'Delete Instruktur Success',
                'data' => $instruktur
            ], 200);
        } // return message saat berhasil menghapus data instruktur


        return response([
            'message' => 'Delete Instruktur Failed',
            'data' => null,
        ], 400); // return message saat gagal menghapus data instruktur
    }
}
