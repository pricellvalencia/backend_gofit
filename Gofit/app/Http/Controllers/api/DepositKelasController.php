<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepositKelas;
use App\Models\DepositPaketKelas;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Carbon;

class DepositKelasController extends Controller
{
    public function index()
    { // untuk menampilkan semua data di tabel transaksi_deposit_kelas
        $transaksi_deposit_kelas = DB::table('transaksi_deposit_kelas')
            ->join('pegawai','transaksi_deposit_kelas.ID_PEGAWAI','=','pegawai.ID_PEGAWAI')
            ->join('member','transaksi_deposit_kelas.ID_MEMBER','=','member.ID_MEMBER')
            ->join('kelas','transaksi_deposit_kelas.ID_KELAS','=','kelas.ID_KELAS')
            ->leftJoin('promo','transaksi_deposit_kelas.ID_PROMO','=','promo.ID_PROMO')
            ->orderBy('transaksi_deposit_kelas.ID_TRANSAKSI_DEPOSIT_KELAS')
            ->get();

        if (count($transaksi_deposit_kelas) > 0) {
            return response([
                'message' => 'Retrieve All Success',
                'data' => $transaksi_deposit_kelas
            ], 200);
        } // return data semua transaksi_deposit_kelas dalam bentuk json

        return response([
            'message' => 'Empty',
            'data' => null
        ], 400); // return message data transaksi_deposit_kelas kosong
    }

    public function store(Request $request)
    { // untuk menambahkan data ke tabel transaksi_deposit_kelas
        try{
            $year = date('y');
            $count = DepositKelas::count() + 1; // get running transaksi_deposit_kelas numbern
            $countDPK = DB::table('deposit_paket_kelas')->count() + 1;
            $month = date('m'); 
            $exp2 = date('m') + 1;
            $exp3 = date('m') + 2;
            $date = date('d') - 1;

            $id_transaksi_deposit_kelas = $year.'.'.$month.'.'.str_pad($count, 3, '0', STR_PAD_LEFT); // generate id transaksi_deposit_kelas
            $tgl_transaksi = date('Y-m-d H:i:s');
            $tanggal = Carbon::parse($tgl_transaksi)->format('Y-m-d');
            $id_pegawai = $request->input('ID_PEGAWAI');
            $id_member = $request->input('ID_MEMBER');
            $id_kelas = $request->input('ID_KELAS');
            $id_promo = null;
            $jumlah_deposit = $request->input('JUMLAH_TRANSAKSI_DEPOSIT_KELAS');
            $bonus_deposit = null;
            $total_pembayaran = null;

            $id_deposit_paket_kelas = 'DPK'.str_pad($countDPK, 3, '0', STR_PAD_LEFT);

            // mengecek apakah member aktif
            $cekMember = DB::table('member')->where('ID_MEMBER',$id_member)->first();
            if($cekMember->STATUS_MEMBER == 'Aktif') {
                // mengecek jumlah transaksi deposit kelas apakah 0 atau sudah kadaluarsa
                // jika tidak maka tidak dapat melakukan transaksi
                // jika ya maka dicek jumlah deposit nya berapa dan diberika promo yang sesuai
                $deposit_paket_kelas = DB::table('deposit_paket_kelas')
                            ->select('DEPOSIT_PAKET_KELAS','TGL_KADALUARSA')
                            ->where('ID_MEMBER','=',$id_member)
                            ->where('ID_KELAS','=',$id_kelas)
                            // ->where('DEPOSIT_PAKET_KELAS','=','0')
                            ->first();
                if(is_null($deposit_paket_kelas)) {
                    if($jumlah_deposit == 5) {
                        $id_promo = 2;
                        // generate bonus deposit uang
                        $promo = DB::table('promo')
                                    ->select('BONUS')
                                    ->where('ID_PROMO','=',$id_promo)
                                    ->first();
                        $bonus_deposit = $promo->BONUS;
                        $masa_berlaku = date('Y-'.$exp2.'-'.$date);
                    } else if ($jumlah_deposit == 10) {
                        $id_promo = 3;
                        // generate bonus deposit uang
                        $promo = DB::table('promo')
                                    ->select('BONUS')
                                    ->where('ID_PROMO','=',$id_promo)
                                    ->first();
                        $bonus_deposit = $promo->BONUS;
                        $masa_berlaku = date('Y-'.$exp3.'-'.$date);
                    } else {
                        return response([
                            'message' => 'Jumlah deposit harus 5 atau 10',
                            'data' => null,
                        ], 402);
                    }
        
                    //mengambil data harga kelas dari tabel kelas
                    $kelas = DB::table('kelas')
                        ->select('HARGA_KELAS')
                        ->where('ID_KELAS','=',$id_kelas)
                        ->first();
            
                    $total_pembayaran = $jumlah_deposit * $kelas->HARGA_KELAS;
    
                    $total_deposit = $jumlah_deposit + $bonus_deposit;
            
                    $request->merge([
                        'ID_TRANSAKSI_DEPOSIT_KELAS' => $id_transaksi_deposit_kelas,
                        'TGL_TRANSAKSI_DEPOSIT_KELAS' => $tgl_transaksi,
                        'ID_PEGAWAI' => $id_pegawai,
                        'ID_MEMBER' => $id_member,
                        'ID_KELAS' => $id_kelas,
                        'ID_PROMO' => $id_promo,
                        'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => $jumlah_deposit,
                        'BONUS_DEPOSIT_KELAS' => $bonus_deposit,
                        'TOTAL_PEMBAYARAN' => $total_pembayaran,
                        'MASA_BERLAKU' => $masa_berlaku
                    ]);
                    
                    $validate = Validator::make($request->all(), [
                        'ID_TRANSAKSI_DEPOSIT_KELAS' => 'required',
                        'ID_PEGAWAI' => 'required',
                        'ID_MEMBER' => 'required',
                        'TGL_TRANSAKSI_DEPOSIT_KELAS' => 'required',
                        'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 'required',
                    ]); // membuat rule validasi input
                    if ($validate->fails()) 
                    return response(['message' => $validate->errors()], 400); // return error invalid input
                    
                    // menambahkan data baru di tabel deposit_paket_kelas
                    DB::table('deposit_paket_kelas')->insert([
                        'ID_DEPOSIT_PAKET_KELAS' => $id_deposit_paket_kelas,
                        'ID_KELAS' => $id_kelas,
                        'ID_MEMBER' => $id_member,
                        'DEPOSIT_PAKET_KELAS' => $total_deposit,
                        'TGL_KADALUARSA' => $masa_berlaku,
                    ]);
                    
                    $transaksi_deposit_kelas = DepositKelas::create($request->all());
                    return response([
                        'message' => 'Berhasil menambahkan transaksi deposit kelas baru',
                        'data' => $transaksi_deposit_kelas,
                    ], 200); // return data transaksi_deposit_kelas baru dalam bentuk json
                    
                // jika deposit kelas masih ada dan belum kadaluarsa
                } else if($deposit_paket_kelas->DEPOSIT_PAKET_KELAS > 0 && $deposit_paket_kelas->TGL_KADALUARSA > $tanggal) {
                    return response([
                        'message' => 'Sisa paket anda masih ada dan belum hangus',
                        'data' => null
                    ], 403);
    
                // jika deposit kelas masih ada dan sudah kadaluarsa
                } else {
                    if($jumlah_deposit == 5) {
                        $id_promo = 2;
                        // generate bonus deposit uang
                        $promo = DB::table('promo')
                                    ->select('BONUS')
                                    ->where('ID_PROMO','=',$id_promo)
                                    ->first();
                        $bonus_deposit = $promo->BONUS;
                        $masa_berlaku = date('Y-'.$exp2.'-'.$date);
                    } else if ($jumlah_deposit == 10) {
                        $id_promo = 3;
                        // generate bonus deposit uang
                        $promo = DB::table('promo')
                                    ->select('BONUS')
                                    ->where('ID_PROMO','=',$id_promo)
                                    ->first();
                        $bonus_deposit = $promo->BONUS;
                        $masa_berlaku = date('Y-'.$exp3.'-'.$date);
                    } else {
                        return response([
                            'message' => 'Jumlah deposit harus 5 atau 10',
                            'data' => null,
                        ], 402);
                    }
        
                    $kelas = DB::table('kelas')
                        ->select('HARGA_KELAS')
                        ->where('ID_KELAS','=',$id_kelas)
                        ->first();
            
                    $total_pembayaran = $jumlah_deposit * $kelas->HARGA_KELAS;
    
                    $total_deposit = $jumlah_deposit + $bonus_deposit;
            
                    $request->merge([
                        'ID_TRANSAKSI_DEPOSIT_KELAS' => $id_transaksi_deposit_kelas,
                        'TGL_TRANSAKSI_DEPOSIT_KELAS' => $tgl_transaksi,
                        'ID_PEGAWAI' => $id_pegawai,
                        'ID_MEMBER' => $id_member,
                        'ID_KELAS' => $id_kelas,
                        'ID_PROMO' => $id_promo,
                        'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => $jumlah_deposit,
                        'BONUS_DEPOSIT_KELAS' => $bonus_deposit,
                        'TOTAL_PEMBAYARAN' => $total_pembayaran,
                        'MASA_BERLAKU' => $masa_berlaku
                    ]);
                    
                    $validate = Validator::make($request->all(), [
                        'ID_TRANSAKSI_DEPOSIT_KELAS' => 'required',
                        'ID_PEGAWAI' => 'required',
                        'ID_MEMBER' => 'required',
                        'TGL_TRANSAKSI_DEPOSIT_KELAS' => 'required',
                        'JUMLAH_TRANSAKSI_DEPOSIT_KELAS' => 'required',
                    ]); // membuat rule validasi input
                    if ($validate->fails()) 
                    return response(['message' => $validate->errors()], 400); // return error invalid input
                    
                    // memperbaharui sisa deposit kelas di database
                    DB::table('deposit_paket_kelas')
                        ->where('ID_MEMBER','=', $id_member)
                        ->where('ID_KELAS','=', $id_kelas)
                        ->update([
                            'DEPOSIT_PAKET_KELAS' => $total_deposit,
                            'TGL_KADALUARSA' => $masa_berlaku,
                        ]);
                    
                    $transaksi_deposit_kelas = DepositKelas::create($request->all());
                    return response([
                        'message' => 'Berhasil menambahkan transaksi deposit kelas baru',
                        'data' => $transaksi_deposit_kelas,
                    ], 200); // return data transaksi_deposit_kelas baru dalam bentuk json
                }
            }
            return response([
                'message' => 'Member tidak aktif'
            ], 401);
        } catch(Exception $e) {
            d($e);
        }
    }

    public function destroy($id_transaksi_deposit_kelas)
    { // menghapus data di tabel transaksi_deposit_kelas berdasarkan id_transaksi_deposit_kelas
        $transaksi_deposit_kelas = DepositKelas::find($id_transaksi_deposit_kelas); // mencari data transaksi_deposit_kelas berdasarkan id_transaksi_deposit_kelas

        if (is_null($transaksi_deposit_kelas)) {
            return response([
                'message' => 'Transaksi Deposit Kelas Not Found',
                'data' => null
            ], 404);
        } // return message saat data transaksi_deposit_kelas tidak ditemukan
        if (DB::table('transaksi_deposit_kelas')->where('ID_TRANSAKSI_DEPOSIT_KELAS', $id_transaksi_deposit_kelas)->delete()) {
            return response([
                'message' => 'Delete Transaksi Deposit Kelas Success',
                'data' => $transaksi_deposit_kelas
            ], 200);
        } // return message saat berhasil menghapus data transaksi_deposit_kelas


        return response([
            'message' => 'Delete Transaksi Deposit Kelas Failed',
            'data' => null,
        ], 400); // return message saat gagal menghapus data member
    }

    public function resetKadaluarsa()
    {
        try {
            // Mendapatkan waktu sekarang
            $now = date('Y-m-d');
    
            // Mengambil semua deposit_kelas yang kadaluarsa nya sudah terlewat per hari ini
            $expiredClass = DepositPaketKelas::where('TGL_KADALUARSA', '<', $now)->get();
            // $expiredClass = DB::table('deposit_paket_kelas')
            //         ->select('TGL_KADALUARSA','DEPOSIT_PAKET_KELAS')
            //         ->where('TGL_KADALUARSA','<',$now)
            //         ->first();
    
            // Mengubah status aktif deposit_kelas menjadi false
            foreach ($expiredClass as $deposit_kelas) {
                $deposit_kelas->DEPOSIT_PAKET_KELAS = 0;
                $deposit_kelas->save();
            }
            
            return response()->json([
                'message' => 'Reset sisa deposit kelas berhasil dilakukan',
                'count' => count($expiredClass)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat melakukan reset sisa deposit kelas: ' . $e->getMessage()
            ], 500);
        }
    }
}
