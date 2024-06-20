<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\riwayatinventorys;

class RiwayatinventoryPageController extends Controller
{
    // Landing Page
    public function index()
    {
        //$riwayatinventory = riwayatinventory::latest()->paginate(5);
        $riwayatinventory = "riwayat Aset";
        $header = false;
        return view('riwayatinventory.index', compact('riwayatinventory','header'));
        //return view('landingpage.layout');
    }


    //Dashboard

    public function home()
    {

        $toptitle = "Dashboard - Riwayat Aset";
        $header = false;
        //$riwayatinventorys = riwayatinventorys::latest()->paginate(5);
        return view('riwayatinventory.tabel', compact('header','toptitle'));
        //return view('landingpage.layout');
    }

    public function lihat()
    {
        $toptitle = "Dashboard - Lihat Riwayat Aset";
        $header = false;
        //$riwayatinventorys = riwayatinventorys::latest()->paginate(5);
        return view('riwayatinventory.lihat', compact('header','toptitle'));
        //return view('landingpage.layout');
    }

    public function tambah()
    {
        //$products = Product::latest()->paginate(5);
        //$riwayatinventory = riwayatinventory::latest()->paginate(5);
        //$kegiatan = Kegiatan::latest()->paginate(5);
        $toptitle = "Tambah Data riwayat Aset";
        $header = false;
        return view('riwayatinventory.tambah', compact('header','toptitle'));
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
        $tujuan_upload = 'images/riwayatinventory';
        $gambar->move($tujuan_upload,$namafile);

        $judulnya = $request->judul;
        //SlugService::createSlug(Post::class, 'slug', $post->title);

        riwayatinventorys::create([
            'judul' => $request->judul,
            'slug' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        if($gambar){
            return redirect('admin/riwayatinventory')->with('success','Data berhasil disimpan');
        }
        else{
            return redirect()->back()->withInput()->withErrors($request->all())->with('error','Data gagal disimpan, cek kembali form anda');
        }
    }


    public function ubah($id)
    {
        $riwayatinventorys = riwayatinventorys::find($id);
        $toptitle = "Ubah Data riwayat Inventory";
        return view('riwayatinventory.ubah', ['dataubah' => $riwayatinventorys,'toptitle' => $toptitle]);
    }


    public function update(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png'
        ]);

        $id = $request->id;
        $riwayatinventorys = riwayatinventorys::find($id);
        $gambar = $request->gambar;
        if($gambar){
            $namafile = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'images/riwayatinventory';
            $gambar->move($tujuan_upload,$namafile);
        }
        else{
            $namafile = $riwayatinventorys->gambar;
        }

        riwayatinventorys::whereId($id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        return redirect('admin/riwayatinventory')->with('success','Data berhasil diubah');
    }


    public function hapus($id)
    {
        $riwayatinventorys = riwayatinventorys::find($id);
        $namafile = $riwayatinventorys->gambar;
        File::delete('/images/barang/'.$namafile);
        if($riwayatinventorys->delete()){
            return redirect('admin/riwayatinventory')->with('success','Data berhasil dihapus');
        }
        else{
            return redirect('admin/riwayatinventory')->with('error','Data gagal dihapus');
        }
    }
}
