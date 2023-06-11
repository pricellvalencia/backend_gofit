<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepositUang;
use Illuminate\Support\Facades\DB;
use Validator;

class DepositUangController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel transaksi_deposit_uang
        $transaksi_deposit_uang = DB::table('transaksi_deposit_uang')->
            join('pegawai','transaksi_deposit_uang.ID_PEGAWAI','=','pegawai.ID_PEGAWAI')->
            join('member','transaksi_deposit_uang.ID_MEMBER','=','member.ID_MEMBER')->
            leftJoin('promo','transaksi_deposit_uang.ID_PROMO','=','promo.ID_PROMO')->
            get();

        if (count($transaksi_deposit_uang) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $transaksi_deposit_uang
            ], 200);
        } // return data semua transaksi_deposit_uang dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data transaksi_deposit_uang kosong
    }

    public function store(Request $request)
    { // untuk menambahkan data ke tabel transaksi_deposit_uang
            $year = date('y');
            $running_number = DepositUang::count() + 1; // get running transaksi_deposit_uang numbern
            $month = date('m'); 

            $id_transaksi_deposit_uang = $year.'.'.$month.'.'.str_pad($running_number, 3, '0', STR_PAD_LEFT); // generate id transaksi_deposit_uang
            $tgl_transaksi = date('Y-m-d H:i:s');
            $id_pegawai = $request->input('ID_PEGAWAI');
            $id_member = $request->input('ID_MEMBER');
            $id_promo = null;
            $jumlah_deposit = $request->input('JUMLAH_TRANSAKSI_DEPOSIT_UANG');
            $bonus_deposit = null;
            $total_deposit = null;

            // mengecek jumlah transaksi deposit uang apakah >= 3.000.000 dan sisa deposit uang apakah >= 500.000
            // jika ya maka id promo diset menjadi 1
            $member = DB::table('member')
                        ->select('JUMLAH_DEPOSIT_UANG')
                        ->where('ID_MEMBER','=',$id_member)
                        ->first();
            if($member->JUMLAH_DEPOSIT_UANG == null) {
                $member->JUMLAH_DEPOSIT_KELAS = 0;
            }
            $sisa_deposit = $member->JUMLAH_DEPOSIT_UANG;
            
            if($jumlah_deposit >= 3000000 && $sisa_deposit >= 500000) {
                $id_promo = 1;
                // generate bonus deposit uang
                $promo = DB::table('promo')
                            ->select('BONUS')
                            ->where('ID_PROMO','=',$id_promo)
                            ->first();
                $bonus_deposit = $promo->BONUS;
            }
            $total_deposit = $jumlah_deposit + $bonus_deposit + $sisa_deposit;

            $request->merge([
                'ID_TRANSAKSI_DEPOSIT_UANG' => $id_transaksi_deposit_uang,
                'TGL_TRANSAKSI_DEPOSIT_UANG' => $tgl_transaksi,
                'ID_PEGAWAI' => $id_pegawai,
                'ID_MEMBER' => $id_member,
                'ID_PROMO' => $id_promo,
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => $jumlah_deposit,
                'BONUS_DEPOSIT_UANG' => $bonus_deposit,
                'TOTAL_TRANSAKSI_DEPOSIT_UANG' => $total_deposit,
            ]);
            
            // memperbaharui sisa deposit uang di database
            DB::table('member')
                ->where('ID_MEMBER','=',$id_member)
                ->update(['JUMLAH_DEPOSIT_UANG' => $total_deposit]);

            $validate = Validator::make($request->all(), [
                'ID_TRANSAKSI_DEPOSIT_UANG' => 'required',
                'ID_PEGAWAI' => 'required',
                'ID_MEMBER' => 'required',
                'TGL_TRANSAKSI_DEPOSIT_UANG' => 'required',
                'JUMLAH_TRANSAKSI_DEPOSIT_UANG' => 'required',
            ]); // membuat rule validasi input
            if ($validate->fails()) 
                return response(['message' => $validate->errors()], 400); // return error invalid input
            
            $transaksi_deposit_uang = DepositUang::create($request->all());
            return response([
                'message' => 'Berhasil menambahkan transaksi deposit uang baru',
                'data' => $transaksi_deposit_uang,
            ], 200); // return data transaksi_deposit_uang baru dalam bentuk json

    }

    public function destroy($id_transaksi_deposit_uang)
    { // menghapus data di tabel transaksi_deposit_uang berdasarkan id_transaksi_deposit_uang
        $transaksi_deposit_uang = DepositUang::find($id_transaksi_deposit_uang); // mencari data transaksi_deposit_uang berdasarkan id_transaksi_deposit_uang

        if (is_null($transaksi_deposit_uang)) {
            return response([
                'message' => 'Transaksi Deposit Uang Not Found',
                'data' => null
            ], 404);
        } // return message saat data transaksi_deposit_uang tidak ditemukan
        if (DB::table('transaksi_deposit_uang')->where('ID_TRANSAKSI_DEPOSIT_UANG', $id_transaksi_deposit_uang)->delete()) {
            return response([
                'message' => 'Delete Transaksi Deposit Uang Success',
                'data' => $transaksi_deposit_uang
            ], 200);
        } // return message saat berhasil menghapus data transaksi_deposit_uang


        return response([
            'message' => 'Delete Transaksi Deposit Uang Failed',
            'data' => null,
        ], 400); // return message saat gagal menghapus data member
    }
}
