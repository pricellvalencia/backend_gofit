<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Validator;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel member
        $member = Member::all();
        if (count($member) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $member
            ], 200);
        } // return data semua member dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data member kosong
    }

    public function store(Request $request)
    { // untuk menambahkan data ke tabel member
        {
            $year = date('y');
            $running_number = Member::count() + 1; // get running member numbern
            $month = date('m'); // get month of first registration
            $id_member = $year.'.'.$month.'.'.str_pad($running_number, 3, '0', STR_PAD_LEFT); // generate id member
    
            $request->merge([
                'ID_MEMBER' => $id_member,
                'WAKTU_DAFTAR_MEMBER' => date('Y-m-d H:i:s'),
                'JUMLAH_DEPOSIT_UANG' => 0,
                'STATUS_MEMBER' => 'Tidak Aktif',
                'PASSWORD_MEMBER' => '12345',
            ]);

            $storeData = $request->all();
            $validate = Validator::make($storeData, [
                'ID_MEMBER' => 'required',
                'NAMA_MEMBER' => 'required',
                'ALAMAT_MEMBER' => 'required',
                'TELEPON_MEMBER' => 'required|max:13',
                'TANGGAL_LAHIR_MEMBER' => 'required',
                'EMAIL' => 'required',
                'WAKTU_DAFTAR_MEMBER' => 'required',
                'JUMLAH_DEPOSIT_UANG' => 'required',
                'STATUS_MEMBER' => 'required',
                'PASSWORD_MEMBER' => 'required',
            ]); // membuat rule validasi input
    
            if ($validate->fails()) 
                return response(['message' => $validate->errors()], 400); // return error invalid input
            
            $member = Member::create($request->all());

            DB::table('user')->insert([
                'id_user' => $member->ID_MEMBER,
                'password' => $member->PASSWORD_MEMBER,
                'role' => 'member'
            ]);

            return response([
                'message' => 'Berhasil menambahkan member baru',
                'data' => $member,
            ], 200); // return data member baru dalam bentuk json
        }
    }

    public function show($id_member)
    { // untuk menampilkan data di tabel member berdasarkan id_member
        $member = Member::find($id_member); // mencari data member berdasarkan id_member

        if(!is_null($member)) {
            return response([
                'message' => 'Show Member Success',
                'data' => $member
            ], 200);
        } // return data member yang ditemukan dalam bentuk json

        return response([
            'message' => 'Member Not Found',
            'data' => null
        ], 404); // return message saat data member tidak ditemukan
    }

    public function update(Request $request, $id_member)
    { // untuk mengupdate data member berdasarkan id_member
        $member = Member::where('ID_MEMBER', '=', $id_member)->first(); //  Mengambil data paket berdasarkan id_member

        if(is_null($member)){
            return response([
                'message' => 'Member Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all(); // Mengambil seluruh data input dan menyimpan dalam variabel updateData
        $validate = Validator::make($updateData, [
            'NAMA_MEMBER' => 'required',
            'ALAMAT_MEMBER' => 'required',
            'TELEPON_MEMBER' => 'required|max:13',
            'TANGGAL_LAHIR_MEMBER' => 'required',
            'EMAIL' => 'required',
        ]);

        if($validate->fails())
            return response(['message' => $validate->errors()], 400);

        if(DB::update('update member set NAMA_MEMBER = ?, ALAMAT_MEMBER = ?, TELEPON_MEMBER =?, TANGGAL_LAHIR_MEMBER =?, EMAIL =? where ID_MEMBER = ?',
            [$request->NAMA_MEMBER, $request-> ALAMAT_MEMBER, $request-> TELEPON_MEMBER, $request-> TANGGAL_LAHIR_MEMBER, $request-> EMAIL, $id_member]))
        {
            $member = Member::where('ID_MEMBER', '=', $id_member)->first(); //  Mengambil data paket berdasarkan id

            return response([
                'message' => 'Update Member Success',
                'data' => $member,
            ], 200);
        }

        return response([
            'message' => 'Update Member Failed',
            'data' => null,
        ], 400);
    }

    public function destroy($id_member)
    { // menghapus data di tabel member berdasarkan id_member
        $member = Member::find($id_member); // mencari data member berdasarkan id_member

        if (is_null($member)) {
            return response([
                'message' => 'Member Not Found',
                'data' => null
            ], 404);
        } // return message saat data member tidak ditemukan
        if (DB::table('member')->where('ID_MEMBER', $id_member)->delete()) {
            DB::table('user')->where('id_user', $id_member)->delete();
            return response([
                'message' => 'Delete Member Success',
                'data' => $member
            ], 200);
        } // return message saat berhasil menghapus data member


        return response([
            'message' => 'Delete Member Failed',
            'data' => null,
        ], 400); // return message saat gagal menghapus data member
    }

    public function resetPassword($id_member)
    {
        // Cari member berdasarkan id
        $member = Member::find($id_member);

        // Jika member tidak ditemukan, kembalikan pesan error
        if (!$member) {
            return "Member with ID " . $id_member . " not found!";
        }

        // Reset password dengan nilai default yaitu tanggal lahir member
        $member->PASSWORD_MEMBER = $member->TANGGAL_LAHIR_MEMBER;

        // Simpan perubahan password
        $member->save();

        // Kembalikan pesan berhasil
        return "Successfully reset password member with ID " . $id_member;
    }

    public function deactivateExpiredMembers()
    {
        try {
            // Mendapatkan waktu sekarang
            $now = date('Y-m-d H:i:s');
    
            // Mengambil semua member yang waktu_aktivasi_ekspired nya sudah terlewat per hari ini
            $expiredMembers = Member::where('WAKTU_AKTIVASI_EKSPIRED', '<', $now)->get();
    
            // Mengubah status aktif member menjadi false
            foreach ($expiredMembers as $member) {
                $member->STATUS_MEMBER = "Tidak Aktif";
                $member->save();
            }
            
            return response()->json([
                'message' => 'Deaktivasi member berhasil dilakukan',
                'count' => count($expiredMembers)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat melakukan deaktivasi member: ' . $e->getMessage()
            ], 500);
        }
    }

    public function showExpiredMembersToday()
    {
        // Mendapatkan waktu sekarang
        $now = date('Y-m-d');

        // Mengambil semua member yang waktu_aktivasi_ekspired nya per hari ini
        $expiredMembers = Member::where('WAKTU_AKTIVASI_EKSPIRED','<',$now)->get();

        // Menampilkan data member dalam bentuk JSON
        return response()->json($expiredMembers);
    }

    public function getPaketKelas($id_member) {
        $deposit_paket_kelas = DB::table('deposit_paket_kelas')
            ->join('kelas', 'deposit_paket_kelas.ID_KELAS', '=', 'kelas.ID_KELAS')
            ->select('DEPOSIT_PAKET_KELAS.*', 'kelas.NAMA_KELAS', 'TGL_KADALUARSA')
            ->where('ID_MEMBER', '=', $id_member)
            ->get();

        if(!is_null($deposit_paket_kelas)) {
            return response([
                'message' => 'Retrieve deposit Paket Success',
                'data' => $deposit_paket_kelas
            ], 200);
        } // return data deposit kelas yang ditemukan dalam bentuk json

        return response([
            'message' => 'deposit paket Not Found',
            'data' => null
        ], 404); // return message saat data deposit kelas tidak ditemukan
    }
}
