<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\PresensiInstruktur;
use App\Models\Instruktur;
use App\Models\JadwalHarian;


class LaporanController extends Controller
{
    public function laporanPendapatan(Request $request)
    { // untuk menampilkan laporan pendapatan (aktivasi dan deposit)
      // per bulan pada tahun tertentu
        $tahun = $request->input('tahun');
        $currentDate = Carbon::now()->format('j F Y');

        // Daftar bulan yang akan ditampilkan
        $bulanList = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $report = DB::table('transaksi_aktivasi')
            ->select(
                DB::raw('MONTH(TGL_TRANSAKSI_AKTIVASI) as bulan'),
                DB::raw('SUM(JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI) as aktivasi'),
                DB::raw('0 as deposit'),
                DB::raw('0 as total_perbulan')
            )
            ->whereYear('TGL_TRANSAKSI_AKTIVASI', $tahun)
            ->groupBy(DB::raw('MONTH(TGL_TRANSAKSI_AKTIVASI)'))
            ->orderBy(DB::raw('MONTH(TGL_TRANSAKSI_AKTIVASI)'))
            ->get();

        $depositKelas = DB::table('transaksi_deposit_kelas')
            ->select(
                DB::raw('MONTH(TGL_TRANSAKSI_DEPOSIT_KELAS) as bulan'),
                DB::raw('SUM(TOTAL_PEMBAYARAN) as deposit')
            )
            ->whereYear('TGL_TRANSAKSI_DEPOSIT_KELAS', $tahun)
            ->groupBy(DB::raw('MONTH(TGL_TRANSAKSI_DEPOSIT_KELAS)'))
            ->orderBy(DB::raw('MONTH(TGL_TRANSAKSI_DEPOSIT_KELAS)'))
            ->get();

        $depositUang = DB::table('transaksi_deposit_uang')
            ->select(
                DB::raw('MONTH(TGL_TRANSAKSI_DEPOSIT_UANG) as bulan'),
                DB::raw('SUM(JUMLAH_TRANSAKSI_DEPOSIT_UANG) as deposit')
            )
            ->whereYear('TGL_TRANSAKSI_DEPOSIT_UANG', $tahun)
            ->groupBy(DB::raw('MONTH(TGL_TRANSAKSI_DEPOSIT_UANG)'))
            ->orderBy(DB::raw('MONTH(TGL_TRANSAKSI_DEPOSIT_UANG)'))
            ->get();

        $reportData = [];

        // Inisialisasi data laporan dengan bulan-bulan
        foreach ($bulanList as $index => $bulan) {
            $reportData[$index]['bulan'] = $index + 1;
            $reportData[$index]['bulan_label'] = $bulan;
            $reportData[$index]['aktivasi'] = 0;
            $reportData[$index]['deposit'] = 0;
            $reportData[$index]['total_perbulan'] = 0;
        }

        // Memasukkan data transaksi ke dalam laporan
        foreach ($report as $row) {
            $index = $row->bulan - 1;
            $reportData[$index]['aktivasi'] = $row->aktivasi;
        }

        foreach ($depositKelas as $row) {
            $index = $row->bulan - 1;
            $reportData[$index]['deposit'] += $row->deposit;
        }

        foreach ($depositUang as $row) {
            $index = $row->bulan - 1;
            $reportData[$index]['deposit'] += $row->deposit;
        }

        // Menghitung total per bulan dan total pertahun
        $totalPertahun = 0;
        foreach ($reportData as &$row) {
            $row['total_perbulan'] = $row['aktivasi'] + $row['deposit'];
            $totalPertahun += $row['total_perbulan'];
        }

        // Menampilkan laporan
        return response()->json([
            'tahun' => $tahun,
            'tanggalCetak' => $currentDate,
            'bulan' => $reportData,
            'totalPertahun' => $totalPertahun
        ]);

        // Menampilkan laporan
        // echo "Laporan Pendapatan Per Bulan Tahun $tahun" . PHP_EOL;
        // echo "Periode: $tahun" . PHP_EOL;
        // echo "Tanggal Cetak: $currentDate" . PHP_EOL;

        // echo str_pad("Bulan", 10);
        // echo str_pad("Aktivasi", 15);
        // echo str_pad("Deposit", 15);
        // echo str_pad("Total Per Bulan", 20);
        // echo PHP_EOL;

        // foreach ($reportData as $row) {
        //     $bulan = $row['bulan_label'];
        //     echo str_pad($bulan, 10);
        //     echo str_pad($row['aktivasi'], 15);
        //     echo str_pad($row['deposit'], 15);
        //     echo str_pad($row['total_perbulan'], 20);
        //     echo PHP_EOL;
        // }

        // echo "Total Pertahun: $totalPertahun" . PHP_EOL;
    }

    public function laporanKelas(Request $request)
    { // untuk menampilkan laporan aktivitas kelas
      // berdasarkan bulan dan tahun yang diinginkan
        // Ambil input bulan dan tahun dari user
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Ambil tanggal saat ini
        $tanggalCetak = date('j F Y');

        // Query untuk mendapatkan data kelas dan instruktur
        $dataKelasInstruktur = DB::table('jadwal_harian')
            ->join('jadwal_default','jadwal_harian.ID_JADWAL_DEFAULT', '=', 'jadwal_default.ID_JADWAL_DEFAULT')
            ->join('kelas', 'jadwal_default.ID_KELAS', '=', 'kelas.ID_KELAS')
            ->join('instruktur', 'jadwal_harian.ID_INSTRUKTUR', '=', 'instruktur.ID_INSTRUKTUR')
            ->select('kelas.NAMA_KELAS', 'kelas.ID_KELAS', 'instruktur.NAMA_INSTRUKTUR', 'jadwal_harian.ID_INSTRUKTUR')
            ->whereYear('jadwal_harian.TANGGAL', $tahun)
            ->whereMonth('jadwal_harian.TANGGAL', $bulan)
            ->orderBy('kelas.NAMA_KELAS', 'asc');

        // Subquery untuk mendapatkan jumlah peserta
        $subQueryPeserta = DB::table('presensi_member_kelas')
            ->select('presensi_member_kelas.ID_JADWAL_HARIAN')
            ->join('jadwal_harian', 'presensi_member_kelas.ID_JADWAL_HARIAN', '=', 'jadwal_harian.ID_JADWAL_HARIAN')
            ->whereNotNull('presensi_member_kelas.WAKTU_PRESENSI_MEMBER_KELAS')
            ->whereYear('jadwal_harian.TANGGAL', $tahun)
            ->whereMonth('jadwal_harian.TANGGAL', $bulan);

        $dataKelasInstruktur = $dataKelasInstruktur
            ->leftJoinSub($subQueryPeserta, 'sub_peserta', function ($join) {
                $join->on('jadwal_harian.ID_JADWAL_HARIAN', '=', 'sub_peserta.ID_JADWAL_HARIAN');
            })
            ->selectRaw('kelas.NAMA_KELAS, kelas.ID_KELAS, instruktur.NAMA_INSTRUKTUR, jadwal_harian.ID_INSTRUKTUR, COUNT(sub_peserta.ID_JADWAL_HARIAN) AS jumlah_peserta')
            ->groupBy('kelas.NAMA_KELAS', 'kelas.ID_KELAS', 'instruktur.NAMA_INSTRUKTUR', 'jadwal_harian.ID_INSTRUKTUR')
            ->get();

        // Query untuk mendapatkan jumlah libur
        $jumlahLibur = DB::table('jadwal_harian')
            ->join('jadwal_default', function ($join) {
                $join->on('jadwal_harian.ID_JADWAL_DEFAULT', '=', 'jadwal_default.ID_JADWAL_DEFAULT')
                    ->on('jadwal_harian.ID_INSTRUKTUR', '=', 'jadwal_default.ID_INSTRUKTUR');
            })
            ->where('STATUS_KELAS', 'Libur')
            ->whereYear('jadwal_harian.TANGGAL', $tahun)
            ->whereMonth('jadwal_harian.TANGGAL', $bulan)
            ->selectRaw('jadwal_default.ID_KELAS, jadwal_default.ID_INSTRUKTUR, count(*) as jumlah_libur')
            ->groupBy('jadwal_default.ID_KELAS', 'jadwal_default.ID_INSTRUKTUR')
            ->get();

        // Menggabungkan jumlahPeserta dan jumlahLibur ke dalam dataKelasInstruktur
        $dataKelasInstruktur = $dataKelasInstruktur->map(function ($kelasInstruktur) use ($jumlahLibur) {
            $kelasID = $kelasInstruktur->ID_KELAS;
            $instrukturID = $kelasInstruktur->ID_INSTRUKTUR;

            $jumlahPesertaData = $kelasInstruktur->jumlah_peserta ?? 0;

            $jumlahLiburData = $jumlahLibur->where('ID_KELAS', $kelasID)
                ->where('ID_INSTRUKTUR', $instrukturID)
                ->first();
            $kelasInstruktur->jumlah_peserta = $jumlahPesertaData;
            $kelasInstruktur->jumlah_libur = $jumlahLiburData->jumlah_libur ?? 0;

            return $kelasInstruktur;
        });

        $namaBulan = date('F', mktime(0, 0, 0, $bulan, 1));
        // Mengirimkan data ke view untuk ditampilkan
        return response()->json([
            'bulan' => $namaBulan,
            'tahun' => $tahun,
            'tanggalCetak' => $tanggalCetak,
            'dataKelasInstruktur' => $dataKelasInstruktur,
        ]);

        //menampilkan laporan di postman
        // echo "Laporan Aktivitas Kelas" . PHP_EOL;
        // echo "Bulan: $bulan     Tahun: $tahun" . PHP_EOL;
        // echo "Tanggal Cetak: $tanggalCetak" . PHP_EOL;

        // echo str_pad("Kelas", 20);
        // echo str_pad("Instruktur", 20);
        // echo str_pad("Jumlah Peserta", 20);
        // echo str_pad("Jumlah Libur", 20);
        // echo PHP_EOL;

        // foreach ($dataKelasInstruktur as $data) {
        //     echo str_pad($data->NAMA_KELAS, 20);
        //     echo str_pad($data->NAMA_INSTRUKTUR, 20);
    
        //     $jumlahPesertaData = $jumlahPeserta->where('ID_KELAS', $data->ID_KELAS)
        //         ->where('ID_INSTRUKTUR', $data->ID_INSTRUKTUR)
        //         ->first();
        //     echo str_pad($jumlahPesertaData->jumlah_peserta ?? 0, 20);
    
        //     $jumlahLiburData = $jumlahLibur->where('ID_KELAS', $data->ID_KELAS)
        //         ->where('ID_INSTRUKTUR', $data->ID_INSTRUKTUR)
        //         ->first();
        //     echo str_pad($jumlahLiburData->jumlah_libur ?? 0, 20);
        //     echo PHP_EOL;
        // }
    }

    public function laporanGym(Request $request)
    { // untuk menampilkan laporan aktivitas gym
      // berdasarkan bulan dan tahun yang diinginkan
        // mengambil inputan bulan dan tahun dari user
        $tahun = $request->input('tahun');
        $bulan = sprintf("%02d", $request->input('bulan')); // mengubah inputan user menjadi 2 digit

        // mengambil tanggal saat ini sebagai tanggal cetak
        $tanggalCetak = date('j F Y');

        // Mendapatkan jumlah hari dalam bulan yang diinput
        $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        // Membuat array kosong untuk menyimpan data laporan
        $laporan = [];

        // Menginisialisasi tanggal awal bulan
        $tanggalAwal = date('Y-m-01', strtotime("$tahun-$bulan-01"));

        // Menginisialisasi tanggal akhir bulan
        $tanggalAkhir = date('Y-m-d', strtotime("$tahun-$bulan-$jumlahHari"));

        // Menghasilkan rentang tanggal dalam bulan yang diinput
        $rentangTanggal = new \DatePeriod(
            new \DateTime($tanggalAwal),
            new \DateInterval('P1D'),
            new \DateTime($tanggalAkhir)
        );

        // Mengisi array laporan dengan tanggal dan jumlah peserta dari query
        foreach ($rentangTanggal as $tanggal) {
            $laporan[] = [
                'tanggal' => $tanggal->format('j F Y'), // Format tanggal dengan "tanggal bulan tahun"
                'jumlahPeserta' => 0
            ];
        }

        // Mengambil data tanggal gym dan jumlah peserta dari query
        $gymActivity = DB::table('booking_sesi_gym')
            ->where('STATUS_BOOKING_GYM', 'Finish')
            ->select('TGL_DIBOOKING')
            ->selectRaw('TGL_DIBOOKING, count(*) as JUMLAH_PESERTA')
            ->whereYear('TGL_DIBOOKING', $tahun)
            ->whereMonth('TGL_DIBOOKING', $bulan)
            ->groupBy('TGL_DIBOOKING')
            ->get();

        // Mengupdate nilai jumlah peserta dalam array laporan
        foreach ($gymActivity as $activity) {
            $tanggalGym = $activity->TGL_DIBOOKING;
            $jumlahPeserta = $activity->JUMLAH_PESERTA;

            // Mencari indeks tanggal dalam array laporan
            $index = array_search(date('j F Y', strtotime($tanggalGym)), array_column($laporan, 'tanggal'));

            // Jika tanggal ditemukan dalam array laporan, update jumlah peserta
            if ($index !== false) {
                $laporan[$index]['jumlahPeserta'] = $jumlahPeserta;
            }
        }

        $namaBulan = date('F', mktime(0, 0, 0, $bulan, 1));
        return response()->json([
            'tahun' => $tahun,
            'bulan' => $namaBulan,
            'tanggalCetak' => $tanggalCetak,
            'dataGym' =>$laporan
        ]);

        //menampilkan laporan di postman
        // echo "Laporan Aktivitas Gym" . PHP_EOL;
        // echo "Bulan: $bulan     Tahun: $tahun" . PHP_EOL;
        // echo "Tanggal Cetak: $tanggalCetak" . PHP_EOL;

        // echo str_pad("Tanggal", 20);
        // echo str_pad("Jumlah Peserta", 20);
        // echo PHP_EOL;

        // // Iterasi untuk setiap tanggal dalam bulan
        // for ($i = 1; $i <= $jumlahHari; $i++) {
        //     $tanggal = sprintf("%02d", $i); // Format tanggal dengan leading zero
        //     $data = $gymActivity->firstWhere('TGL_DIBOOKING', "$tahun-$bulan-$tanggal");

        //     echo str_pad("$tanggal-$bulan-$tahun", 20);
        //     echo str_pad($data ? $data->JUMLAH_PESERTA : 0, 20);
        //     echo PHP_EOL;
        // }
    }

    public function laporanKinerja(Request $request)
    { // 
        // mengambil inputan bulan dan tahun dari user
        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');

        // mengambil tanggal saat ini sebagai tanggal cetak
        $tanggalCetak = date('j F Y');

        $instrukturs = Instruktur::pluck('NAMA_INSTRUKTUR');

        $laporanKinerja = [];

        foreach ($instrukturs as $instruktur) {
            $idInstruktur = Instruktur::where('NAMA_INSTRUKTUR', $instruktur)
                ->value('ID_INSTRUKTUR');

            $jumlahHadir = PresensiInstruktur::whereNotNull('WAKTU_MULAI_KELAS')
                ->whereMonth('WAKTU_MULAI_KELAS', $bulan)
                ->whereYear('WAKTU_MULAI_KELAS', $tahun)
                ->where('ID_INSTRUKTUR', $idInstruktur)
                ->count();

            $jumlahLibur = JadwalHarian::where('STATUS_KELAS', 'Libur')
                ->whereMonth('TANGGAL', $bulan)
                ->whereYear('TANGGAL', $tahun)
                ->where('ID_INSTRUKTUR', $idInstruktur)
                ->count();

            $keterlambatan = PresensiInstruktur::whereNotNull('KETERLAMBATAN')
                ->whereMonth('WAKTU_MULAI_KELAS', $bulan)
                ->whereYear('WAKTU_MULAI_KELAS', $tahun)
                ->where('ID_INSTRUKTUR', $idInstruktur)
                ->sum('KETERLAMBATAN');

            // Mengganti nilai null dengan 0 jika keterlambatan bernilai null
            $keterlambatan = $keterlambatan ?? 0;

            $laporanKinerja[] = [
                'NAMA_INSTRUKTUR' => $instruktur,
                'JUMLAH_HADIR' => $jumlahHadir,
                'JUMLAH_LIBUR' => $jumlahLibur,
                'KETERLAMBATAN' => $keterlambatan,
            ];
        }

        // Mengurutkan data berdasarkan waktu keterlambatan secara ascending
        usort($laporanKinerja, function ($a, $b) {
            return $a['KETERLAMBATAN'] <=> $b['KETERLAMBATAN'];
        });

        $namaBulan = date('F', mktime(0, 0, 0, $bulan, 1));
        // mengirimkan response dalam bentuk json
        return response()->json([
            'bulan' => $namaBulan,
            'tahun' => $tahun,
            'tanggalCetak' => $tanggalCetak,
            'dataKinerja' => $laporanKinerja
        ]);
    }

    // ini menampilakn bulan yg ada transaksinya saja
    // public function laporanPendapatan(Request $request)
    // { // untuk menampilkan laporan pendapatan (aktivasi dan deposit)
    //   // per bulan pada tahun tertentu
    //     $tahun = $request->tahun;
    //     $currentDate = Carbon::now()->format('Y-m-d');

    //     $report = DB::table('transaksi_aktivasi')
    //         ->select(
    //             DB::raw('MONTH(TGL_TRANSAKSI_AKTIVASI) as bulan'),
    //             DB::raw('SUM(JUMLAH_PEMBAYARAN_TRANSAKSI_AKTIVASI) as aktivasi'),
    //             DB::raw('0 as deposit'),
    //             DB::raw('0 as total_perbulan')
    //         )
    //         ->whereYear('TGL_TRANSAKSI_AKTIVASI', $tahun)
    //         ->groupBy(DB::raw('MONTH(TGL_TRANSAKSI_AKTIVASI)'))
    //         ->orderBy(DB::raw('MONTH(TGL_TRANSAKSI_AKTIVASI)'))
    //         ->get();

    //     $deposit = DB::table('transaksi_deposit_kelas')
    //         ->select(
    //             DB::raw('MONTH(TGL_TRANSAKSI_DEPOSIT_KELAS) as bulan'),
    //             DB::raw('SUM(TOTAL_PEMBAYARAN) as deposit')
    //         )
    //         ->whereYear('TGL_TRANSAKSI_DEPOSIT_KELAS', $tahun)
    //         ->groupBy(DB::raw('MONTH(TGL_TRANSAKSI_DEPOSIT_KELAS)'))
    //         ->orderBy(DB::raw('MONTH(TGL_TRANSAKSI_DEPOSIT_KELAS)'))
    //         ->get();

    //     $depositUang = DB::table('transaksi_deposit_uang')
    //         ->select(
    //             DB::raw('MONTH(TGL_TRANSAKSI_DEPOSIT_UANG) as bulan'),
    //             DB::raw('SUM(TOTAL_TRANSAKSI_DEPOSIT_UANG) as deposit')
    //         )
    //         ->whereYear('TGL_TRANSAKSI_DEPOSIT_UANG', $tahun)
    //         ->groupBy(DB::raw('MONTH(TGL_TRANSAKSI_DEPOSIT_UANG)'))
    //         ->orderBy(DB::raw('MONTH(TGL_TRANSAKSI_DEPOSIT_UANG)'))
    //         ->get();

    //     foreach ($report as $key => $row) {
    //         $depositRow = $deposit->where('bulan', $row->bulan)->first();
    //         $depositUangRow = $depositUang->where('bulan', $row->bulan)->first();

    //         $depositKelasAmount = isset($depositKelasRow) ? $depositKelasRow->deposit : 0;
    //         $depositUangAmount = isset($depositUangRow) ? $depositUangRow->deposit : 0;
    //         $row->deposit = $depositKelasAmount + $depositUangAmount;
    //         $row->total_perbulan = $row->aktivasi + $row->deposit;
    //     }

    //     $totalPertahun = $report->sum('total_perbulan');

    //     // Menampilkan laporan
    //     echo "Laporan Pendapatan Per Bulan Tahun $tahun" . PHP_EOL;
    //     echo "Periode: $tahun" . PHP_EOL;
    //     echo "Tanggal Cetak: $currentDate" . PHP_EOL;

    //     echo str_pad("Bulan", 10);
    //     echo str_pad("Aktivasi", 15);
    //     echo str_pad("Deposit", 15);
    //     echo str_pad("Total Per Bulan", 20);
    //     echo PHP_EOL;

    //     foreach ($report as $row) {
    //         $bulan = \Carbon\Carbon::create(null, $row->bulan, null)->format('F');
    //         echo str_pad($bulan, 10);
    //         echo str_pad($row->aktivasi, 15);
    //         echo str_pad($row->deposit, 15);
    //         echo str_pad($row->total_perbulan, 20);
    //         echo PHP_EOL;
    //     }

    //     echo "Total Pertahun: $totalPertahun" . PHP_EOL;
    // }
}