<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;
use Validator;

class PromoController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel promo
        $promo = Promo::all();
        if (count($promo) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $promo
            ], 200);
        } // return data semua promo dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data promo kosong
    }

    public function store(Request $request)
    { // untuk menambahkan data ke tabel promo
        {
            $storeData = $request->all();
            $validate = Validator::make($storeData, [
                'id_promo',
                'nama_promo',
                'deskripsi_promo',
                'waktu_mulai_promo',
                'waktu_selesai_promo',
            ]); // membuat rule validasi input
    
            if ($validate->fails()) 
                return response(['message' => $validate->errors()], 400); // return error invalid input
    
            $promo = Promo::create($request->all());
            return response([
                'message' => 'Berhasil menambahkan promo baru',
                'data' => $promo,
            ], 200); // return data promo baru dalam bentuk json
        }
    }

    public function show($id_promo)
    { // untuk menampilkan data di tabel promo berdasarkan id_promo
        $promo = Promo::find($id_promo); // mencari data promo berdasarkan id_promo

        if(!is_null($promo)) {
            return response([
                'message' => 'Show Promo Success',
                'data' => $promo
            ], 200);
        } // return data promo yang ditemukan dalam bentuk json

        return response([
            'message' => 'Promo Not Found',
            'data' => null
        ], 404); // return message saat data promo tidak ditemukan
    }

    public function update(Request $request, $id_promo)
    { // untuk mengupdate data promo berdasarkan id_promo
        $promo = Promo::find($id_promo); // mencari data promo berdasarkan id
        if (is_null($promo)) {
            return response([
                'message' => 'Promo Not Found',
                'data' => null
            ], 404);
        } // return message saat data promo tidak ditemukan

        $updateData = $request->all(); // mengambil semua input dari api client
        $validate = Validator::make($updateData, [
            'id_promo',
            'nama_promo',
            'deskripsi_promo',
            'waktu_mulai_promo',
            'waktu_selesai_promo',
        ]); // membuat rule validasi input

        if($validate->fails())
            return response(['message' => $validate->errors()], 400); // return error invalid input

        $promo->id_promo = $updateData['id_promo']; // update id_promo
        $promo->nama_promo = $updateData['nama_promo']; // update nama_promo
        $promo->deskripsi_promo = $updateData['deskripsi_promo']; // update deskripsi_promo
        $promo->waktu_mulai_promo = $updateData['waktu_mulai_promo']; // update waktu_mulai_promo
        $promo->waktu_selesai_promo = $updateData['waktu_selesai_promo']; // update waktu_selesai_promo

        if ($promo->save()) {
            return response([
                'message' => 'Update Promo Success',
                'data' => $promo
            ], 200);
        } // return data promo baru dalam bentuk json

        return response([
            'message' => 'Update Promo Failed',
            'data' => null
        ], 400); // return message saat promo gagal di update
    }

    public function destroy($id_promo)
    { // menghapus data di tabel promo berdasarkan id_promo
        $promo = Promo::find($id_promo); // mencari data promo berdasarkan id_promo

        if (is_null($promo)) {
            return response([
                'message' => 'Promo not found',
                'data' => null
            ], 404);
        } // return message saat data promo tidak ditemukan

        if ($promo->delete()) {
            return response([
                'message' => 'Delete promo success',
                'data' => $promo
            ], 200);
        } // return message saat berhasil menghapus data promo
        
        
        return response([
            'message' => 'Delete promo failed',
            'data' => null,
        ], 400); // return message saat gagal menghapus data promo
    }
}