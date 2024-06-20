<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraans;

class KendaraanPageController extends Controller
{
    // Landing Page
    public function index()
    {
        //$Kendaraan = Kendaraan::latest()->paginate(5);
        $kendaraan = "Kendaraan";
        $toptitle = "Data Kendaraan";
        $header = false;
        return view('Kendaraan.tabel', compact('kendaraan','header','toptitle'));
        //return view('landingpage.layout');
    }

    //Dashboard
    public function home()
    {

        $toptitle = "Dashboard - Kendaraan";
        $header = false;
        //$Kendaraans = Kendaraans::latest()->paginate(5);
        return view('Kendaraan.tabel', compact('header','toptitle'));
        //return view('landingpage.layout');
    }

    public function editriwayat()
    {
        //$products = Product::latest()->paginate(5);
        //$Kendaraan = Kendaraan::latest()->paginate(5);
        //$kegiatan = Kegiatan::latest()->paginate(5);
        $toptitle = "Tambah Data Kendaraan";
        $header = false;
        return view('Kendaraan.edit', compact('header','toptitle'));
        //return view('landingpage.layout');
    }


    public function simpan(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        //upload gambar
        $gambar = $request->gambar;
        $namafile = time()."_".$gambar->getClientOriginalName();
        $tujuan_upload = 'images/Kendaraan';
        $gambar->move($tujuan_upload,$namafile);

        $judulnya = $request->judul;
        //SlugService::createSlug(Post::class, 'slug', $post->title);

        Kendaraans::create([
            'judul' => $request->judul,
            'slug' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        if($gambar){
            return redirect('admin/Kendaraan')->with('success','Data berhasil disimpan');
        }
        else{
            return redirect()->back()->withInput()->withErrors($request->all())->with('error','Data gagal disimpan, cek kembali form anda');
        }
    }


    public function ubah($id)
    {
        $Kendaraans = Kendaraans::find($id);
        $toptitle = "NOBEL INDONESIA :. Ubah Data Kendaraan";
        return view('Kendaraan.ubah', ['dataubah' => $Kendaraans,'toptitle' => $toptitle]);
    }


    public function update(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png'
        ]);

        $id = $request->id;
        $Kendaraans = Kendaraans::find($id);
        $gambar = $request->gambar;
        if($gambar){
            $namafile = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'images/Kendaraan';
            $gambar->move($tujuan_upload,$namafile);
        }
        else{
            $namafile = $Kendaraans->gambar;
        }

        Kendaraans::whereId($id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        return redirect('admin/Kendaraan')->with('success','Data berhasil diubah');
    }


    public function hapus($id)
    {
        $Kendaraans = Kendaraans::find($id);
        $namafile = $Kendaraans->gambar;
        File::delete('/images/Kendaraan/'.$namafile);
        if($Kendaraans->delete()){
            return redirect('admin/Kendaraan')->with('success','Data berhasil dihapus');
        }
        else{
            return redirect('admin/Kendaraan')->with('error','Data gagal dihapus');
        }
    }
}
