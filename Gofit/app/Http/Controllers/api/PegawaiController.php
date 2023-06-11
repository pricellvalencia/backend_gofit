<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Validator;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel pegawai
        $pegawai = Pegawai::all();
        if (count($pegawai) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $pegawai
            ], 200);
        } // return data semua pegawai dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data pegawai kosong
    }

    public function store(Request $request)
    { // untuk menambahkan data ke tabel pegawai
        {
            $storeData = $request->all();
            $validate = Validator::make($storeData, [
                'id_pegawai' => 'required',
                'nama_pegawai' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required|max:13',
                'role' => 'required',
                'email' => 'required',
                'username' => 'required',
                'password' => 'required',
            ]); // membuat rule validasi input
    
            if ($validate->fails()) 
                return response(['message' => $validate->errors()], 400); // return error invalid input
    
            $pegawai = Pegawai::create($request->all());

            $tambahUser =[
                'id_user' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
            ];
            User::create($tambahUser);
    
            return response([
                'message' => 'Berhasil menambahkan pegawai baru',
                'data' => $pegawai,
            ], 200); // return data pegawai baru dalam bentuk json
        }
    }

    public function show($id_pegawai)
    { // untuk menampilkan data di tabel pegawai berdasarkan id_pegawai
        $pegawai = Pegawai::find($id_pegawai); // mencari data pegawai berdasarkan id_pegawai

        if(!is_null($pegawai)) {
            return response([
                'message' => 'Show Pegawai Success',
                'data' => $pegawai
            ], 200);
        } // return data pegawai yang ditemukan dalam bentuk json

        return response([
            'message' => 'Pegawai Not Found',
            'data' => null
        ], 404); // return message saat data pegawai tidak ditemukan
    }

    public function update(Request $request, $id_pegawai)
    { // untuk mengupdate data pegawai berdasarkan id_pegawai
        $pegawai = Pegawai::find($id_pegawai); // mencari data pegawai berdasarkan id
        if (is_null($pegawai)) {
            return response([
                'message' => 'Pegawai Not Found',
                'data' => null
            ], 404);
        } // return message saat data pegawai tidak ditemukan

        $updateData = $request->all(); // mengambil semua input dari api client
        $validate = Validator::make($updateData, [
            'id_pegawai' => 'required',
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password' => 'required',
        ]); // membuat rule validasi input

        if($validate->fails())
            return response(['message' => $validate->errors()], 400); // return error invalid input

        $pegawai->id_pegawai = $updateData['id_pegawai']; // update id_pegawai
        $pegawai->nama_pegawai = $updateData['nama_pegawai']; // update nama_pegawai
        $pegawai->alamat = $updateData['alamat']; // update alamat
        $pegawai->no_telp = $updateData['no_telp']; // update no_telp
        $pegawai->role = $updateData['role']; // update role
        $pegawai->email = $updateData['email']; // update email
        $pegawai->username = $updateData['username']; // update username
        $pegawai->password = $updateData['password']; // update password

        if ($pegawai->save()) {
            return response([
                'message' => 'Update Pegawai Success',
                'data' => [
                    'id_pegawai' => $pegawai->id_pegawai,
                    'nama_pegawai' => $pegawai->nama_pegawai,
                    'alamat' => $pegawai->alamat,
                    'no_telp' => $pegawai->no_telp,
                    'role' => $pegawai->role,
                    'email' => $pegawai->email,
                    'username' => $pegawai->username,
                    'password' => $pegawai->password,
                ]
            ], 200);
        } // return data pegawai baru dalam bentuk json

        return response([
            'message' => 'Update Pegawai Failed',
            'data' => null
        ], 400); // return message saat pegawai gagal di update
    }

    public function destroy($id_pegawai) 
    { // untuk menghapus data di tabel pegawai berdasarkan id_pegawai
        $pegawai = Pegawai::find($id_pegawai); // mencari data pegawai berdasarkan id

        if (is_null($pegawai)) {
            return response([
                'message' => 'Pegawai Not Found',
                'data' => null
            ], 404);
        } // return message saat data pegawai tidak ditemukan
        if (DB::table('pegawai')->where('id_pegawai', $id_pegawai)->delete()) {
            return response([
                'message' => 'Delete Pegawai Success',
                'data' => $pegawai
            ], 200);
        } // return message saat berhasil menghapus data pegawai


        return response([
            'message' => 'Delete Pegawai Failed',
            'data' => null,
        ], 400); // return message saat gagal menghapus data pegawai
    }
}
