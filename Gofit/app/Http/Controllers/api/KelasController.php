<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Validator;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel kelas
        $kelas = Kelas::all();
        if (count($kelas) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $kelas
            ], 200);
        } // return data semua kelas dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data kelas kosong
    }

    public function store(Request $request)
    { // untuk menambahkan data ke tabel kelas
        $storeData = $request->all();
        $validate = Validator::make($storeData, [
            'id_kelas',
            'nama_kelas',
            'harga_kelas',
        ]); // membuat rule validasi input

        if ($validate->fails()) 
            return response(['message' => $validate->errors()], 400); // return error invalid input

        $kelas = Kelas::create($request->all());
        return response([
            'message' => 'Berhasil menambahkan kelas baru',
            'data' => $kelas,
        ], 200); // return data kelas baru dalam bentuk json
    }

    public function show($id_kelas)
    { // untuk menampilkan data di tabel kelas berdasarkan id_kelas
        $kelas = Kelas::find($id_kelas); // mencari data kelas berdasarkan id_kelas

        if(!is_null($kelas)) {
            return response([
                'message' => 'Show Kelas Success',
                'data' => $kelas
            ], 200);
        } // return data kelas yang ditemukan dalam bentuk json

        return response([
            'message' => 'Kelas Not Found',
            'data' => null
        ], 404); // return message saat data kelas tidak ditemukan
    }

    public function update(Request $request, $id_kelas)
    { // untuk mengupdate data di tabel kelas berdasarkan id_kelas
        $kelas = Kelas::find($id_kelas); // mencari data kelas berdasarkan id
        if (is_null($kelas)) {
            return response([
                'message' => 'Kelas Not Found',
                'data' => null
            ], 404);
        } // return message saat data kelas tidak ditemukan

        $updateData = $request->all(); // mengambil semua input dari api client
        $validate = Validator::make($updateData, [
            'id_kelas',
            'nama_kelas',
            'harga_kelas',
        ]); // membuat rule validasi input

        if($validate->fails())
            return response(['message' => $validate->errors()], 400); // return error invalid input

        $kelas->id_kelas = $updateData['id_kelas']; // update id_kelas
        $kelas->nama_kelas = $updateData['nama_kelas']; // update nama_kelas
        $kelas->harga_kelas = $updateData['harga_kelas']; // update harga_kelas

        if ($kelas->save()) {
            return response([
                'message' => 'Update Kelas Success',
                'data' => [
                    'id_kelas' => $kelas->id_kelas,
                    'nama_kelas' => $kelas->nama_kelas,
                    'harga_kelas' => $kelas->harga_kelas,
                ]
            ], 200);
        } // return data kelas baru dalam bentuk json

        return response([
            'message' => 'Update Kelas Failed',
            'data' => null
        ], 400); // return message saat kelas gagal di update
    }

    public function destroy($id_kelas)
    { // untuk menghapus data di tabel kelas berdasarkan id_kelas
        $kelas = Kelas::find($id_kelas); // mencari data kelas berdasarkan id_kelas

        if (is_null($kelas)) {
            return response([
                'message' => 'Kelas Not Found',
                'data' => null
            ], 404);
        } // return message saat data kelas tidak ditemukan
        if (DB::table('kelas')->where('id_kelas', $id_kelas)->delete()) {
            return response([
                'message' => 'Delete Kelas Success',
                'data' => $kelas
            ], 200);
        } // return message saat berhasil menghapus data kelas


        return response([
            'message' => 'Delete Kelas Failed',
            'data' => null,
        ], 400); // return message saat gagal menghapus data kelas
    }
}
