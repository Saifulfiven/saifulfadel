<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracers;
use App\Models\Tracerduas;
use App\Models\Tracertigas;
use App\Models\Lulusans;
use App\Models\provinces;
use App\Models\regencies;

class TracerStudyPageController extends Controller
{
    //
    public function index()
    {
        $toptitle = "NOBEL Indonesia :. Data Tracerstudy Alumni";
        $header = false;
        $provinces = provinces::all();
        return view('tracerstudy.index', compact('header','toptitle','provinces'));
    }

    public function processText(Request $request)
    {
        if ($request->has('text')) {
            // Lakukan apa pun yang Anda inginkan dengan teks yang diterima, misalnya simpan di database
            
            $lulusan = Lulusans::where('nimhsmsmh', $request->text)->first();
            if ($lulusan) {
                return response()->json(['kode' => '200',
                                         'nmmhsmsmh' => $lulusan->nmmhsmsmh,
                                         'emailmsmh' => $lulusan->emailmsmh,
                                         'nik' => $lulusan->nik,
                                         'prodi' => $lulusan->prodi]);
            } else {
                return response()->json(['kode' => '404','pesan' => 'Data tidak ditemukan']);
            }
            //return response()->json(['nmmhsmsmh' => $nmmhsmsmh,'telpomsmh' => $telpomsmh,'kodeprodi' => $kodeprodi]);
            // Di sini, Anda bisa menambahkan logika lainnya, seperti menyimpan ke database
            
            // Kirim pesan sukses kembali
            //return "Teks berhasil disimpan: " . $text;
        }
    }

    public function searchdatapribadi(){
		// Ambil data ID Provinsi yang dikirim via ajax post
		$nimhsmsmh = $this->input->post('nimhsmsmh');
        //$Lulusans = Lulusans::where('nimhsmsmh', $nimhsmsmh)->first();
        if ($nimhsmsmh) {
            $nmmhsmsmh = "anak Kucing";
            //$nmmhsmsmh = $Lulusans->nmmhsmsmh;
        } else {
            $nmmhsmsmh = 'Data Tidak Ditemukan';
        }
        return response()->json(['nmmhsmsmh' => $nmmhsmsmh]);
	}

    // Search Kabupaten
    public function searchkabupaten(Request $request)
    {
        $regencies = regencies::select('id','name')
                                ->where('province_id',$request->id_provinsi)->get();
        return $regencies;
        return response()->json($regencies);
    }
    
    public function store(Request $request)
    {
        // insert data ke tabel pertama
        $insert1 = Tracers::create([
            'nimhsmsmh' => $request->nimhsmsmh,
            'nmmhsmsmh' => $request->nmmhsmsmh,
            'telpomsmh' => $request->telpomsmh,
            'kodeprodi' => $request->kodeprodi,
            'tahunlulus' => $request->tahunlulus,
            'emailmsmh' => $request->emailmsmh,
            'nik' => $request->nik,
            'npwp' => $request->npwp,
        ]);
        
        // insert data ke tabel kedua
        $insert2 = Tracerduas::create([
            'satu' => $request->satu,
            'duaA' => $request->duaA,
            'duaB' => $request->duaB,
            'duaC' => $request->duaC,
            'tiga' => $request->kabupaten,
            'empatP' => $request->empatP,
            'empat_lainnya' => $request->empat_lainnya,
            'lima' => $request->lima,
            'enam' => $request->enam,
            'tujuh' => $request->tujuh,
            'delapan_biaya' => $request->delapan_biaya,
            'delapan_program' => $request->delapan_program,
            'delapan_kampus' => $request->delapan_kampus,
            'delapan_tahun' => $request->delapan_tahun,
            'sembilanP' => $request->sembilanP,
            'sembilan_lainnya' => $request->sembilan_lainnya,
            'sepuluh' => $request->sepuluh,
            'id_stepSatu' => $insert1->id,
        ]);

        // insert data ke tabel Tiga
        $insert3 = Tracertigas::create([
            'id_stepSatu' => $insert1->id,
            'seblas' => $request->seblas,
            'duabelasaetika' => $request->duabelasaetika,
            'duabelasakeahlian' => $request->duabelasakeahlian,
            'duabelasainggris' => $request->duabelasainggris,
            'duabelasatekonologi' => $request->duabelasatekonologi,
            'duabelasakomunikasi' => $request->duabelasakomunikasi,
            'duabelasasamatim' => $request->duabelasasamatim,
            'duabelasapengembangan' => $request->duabelasapengembangan,
            'duabelasbetika' => $request->duabelasbetika,
            'duabelasbkeahlian' => $request->duabelasbkeahlian,
            'duabelasbinggris' => $request->duabelasbinggris,
            'duabelasbtekonologi' => $request->duabelasbtekonologi,
            'duabelasbkomunikasi' => $request->duabelasbkomunikasi,
            'duabelasbsamatim' => $request->duabelasbsamatim,
            'duabelasbpengembangan' => $request->duabelasbpengembangan,
        
        ]);
        // insert data ke tabel Tiga kedua
        $empat = $request->empatbelas;
        if($empat == 1){
            $jawaban14 = "Kira-kira $empat bulan sebelum lulus";
        }else if($empat == 2){
            $jawaban14 = "Kira-kira $empat bulan sesudah lulus";
        }else{
            $jawaban14 = "Saya tidak mencari kerja";
        }


        $limabelas_lainnya = [];
        if (!empty($request->limabelas)) {
            foreach ($request->limabelas as $empatbelas) {
                $limabelas_lainnya[] = $empatbelas;
            }
            $jawaban15 = implode(", ", $limabelas_lainnya);
        }
        
        $duapuluh_lainnya = [];
        if (!empty($request->duapuluh)) {
            foreach ($request->duapuluh as $duapuluh) {
                $duapuluh_lainnya[] = $duapuluh;
            }
            $jawaban20 = implode(", ", $duapuluh_lainnya);
        }

        $insert4 = StepTigaDua::create([
            'tigabelasperkuliahan'  => $request->tigabelasperkuliahan,
            'tigabelasdemonstrasi'  => $request->tigabelasdemonstrasi,
            'tigabelaspartisipasi'  => $request->tigabelaspartisipasi,
            'tigabelasmagang'       => $request->tigabelasmagang,
            'tigabelaspraktikum'    => $request->tigabelaspraktikum,
            'tigabelaskerja'        => $request->tigabelaskerja,
            'tigabelasdiskusi'      => $request->tigabelasdiskusi,
            'empatbelas'            => $jawaban14,
            'limabelas'             => $jawaban15,
            'limabelaslainnya'      => $request->limabelaslainnya,
            'tujuhbelas'            => $request->tujuhbelas,
            'enambelas'             => $request->enambelas,
            'delapanbelas'          => $request->delapanbelas,
            'sembilanbelas'         => $request->sembilanbelas,
            'sembilanbelaslainnya'  => $request->sembilanbelaslainnya,
            'duapuluh'              => $jawaban20,
            'duapuluhlainnya'       => $request->duapuluhlainnya,
            'id_stepSatu'           => $insert1->id,
        ]);
        

        // ambil nilai dari checkbox dan jadikan satu data
        // $jenis_pekerjaan = [];
        // foreach ($request->limabelas as $value) {
        //     $jenis_pekerjaan[] = $value;
        // }
        // insert data ke tabel ketiga
        // $insert3 = \App\TracerStudyBisnis::create([
            // 'jenis_pekerjaan' => implode(" ", $request->jenis_pekerjaan),
            // 'nama_perusahaan' => $request->nama_perusahaan,
        //     'jenis_bisnis' => $request->jenis_bisnis,
        //     'nama_bisnis' => $request->nama_bisnis,
        //     'id_stepSatu' => $insert1->id,
        // ]);
        
        // jika semua tabel sukses diinput maka lanjut ke halaman berikutnya
        if($insert1 && $insert2 && $insert3 && $insert4) {
            return redirect('tracerstudy/sukses');
        } else {
            // jika ada yang gagal maka seluruh proses dibatalkan
            Tracers::where('id', $insert1->id)->delete();
            Tracerduas::where('id_stepSatu', $insert2->id)->delete();
            Tracertigas::where('id_stepSatu', $insert3->id)->delete();
            StepTigaDua::where('id_stepSatu', $insert4->id)->delete();
           // \App\TracerStudyBisnis::where('id', $insert3->id)->delete();
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan dalam penyimpanan data');
        }
    }

    public function sukses()
    {
        $toptitle = "NOBEL INDONESIA:. Data Tracerstudy Alumni";
        $header = false;
        return view('tracerstudy.sukses', compact('header','toptitle'));
    }


}
