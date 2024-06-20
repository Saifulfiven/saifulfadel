<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangs;

class BarangPageController extends Controller
{
    // Landing Page
    public function index()
    {
        //$barang = barang::latest()->paginate(5);
        $barang = "barang";
        $header = false;
        return view('barang.index', compact('barang','header'));
        //return view('landingpage.layout');
    }

    public function stockopname()
    {
        //$barang = barang::latest()->paginate(5);
        $toptitle = " Tambah Riwayat Peminjaman";;
        $barang = "barang";
        $header = false;
        return view('barang.stockopname', compact('barang','header','toptitle'));
        //return view('landingpage.layout');
    }


    //Dashboard

    public function home()
    {

        $toptitle = "Dashboard - barang";
        $header = false;
        //$barangs = barangs::latest()->paginate(5);
        return view('barang.tabel', compact('header','toptitle'));
        //return view('landingpage.layout');
    }

    public function tambah()
    {
        //$products = Product::latest()->paginate(5);
        //$barang = barang::latest()->paginate(5);
        //$kegiatan = Kegiatan::latest()->paginate(5);
        $toptitle = "NOBEL INDONESIA :. Tambah Data barang";
        $header = false;
        return view('barang.tambah', compact('header','toptitle'));
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
        $tujuan_upload = 'images/barang';
        $gambar->move($tujuan_upload,$namafile);

        $judulnya = $request->judul;
        //SlugService::createSlug(Post::class, 'slug', $post->title);

        barangs::create([
            'judul' => $request->judul,
            'slug' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        if($gambar){
            return redirect('admin/barang')->with('success','Data berhasil disimpan');
        }
        else{
            return redirect()->back()->withInput()->withErrors($request->all())->with('error','Data gagal disimpan, cek kembali form anda');
        }
    }


    public function ubah($id)
    {
        $barangs = barangs::find($id);
        $toptitle = "NOBEL INDONESIA :. Ubah Data barang";
        return view('barang.ubah', ['dataubah' => $barangs,'toptitle' => $toptitle]);
    }


    public function update(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png'
        ]);

        $id = $request->id;
        $barangs = barangs::find($id);
        $gambar = $request->gambar;
        if($gambar){
            $namafile = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'images/barang';
            $gambar->move($tujuan_upload,$namafile);
        }
        else{
            $namafile = $barangs->gambar;
        }

        barangs::whereId($id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        return redirect('admin/barang')->with('success','Data berhasil diubah');
    }


    public function hapus($id)
    {
        $barangs = barangs::find($id);
        $namafile = $barangs->gambar;
        File::delete('/images/barang/'.$namafile);
        if($barangs->delete()){
            return redirect('admin/barang')->with('success','Data berhasil dihapus');
        }
        else{
            return redirect('admin/barang')->with('error','Data gagal dihapus');
        }
    }
}
