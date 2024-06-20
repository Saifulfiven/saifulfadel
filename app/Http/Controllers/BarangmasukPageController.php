<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangmasuks;

class BarangmasukPageController extends Controller
{
    // Landing Page
    public function index()
    {
        //$Barangmasuk = Barangmasuk::latest()->paginate(5);
        $barangmasuk = "Barang masuk";
        $header = false;
        return view('barangmasuk.index', compact('barangmasuk','header'));
        //return view('landingpage.layout');
    }


    //Dashboard

    public function home()
    {

        $toptitle = "Dashboard - Barangmasuk";
        $header = false;
        //$Barangmasuks = Barangmasuks::latest()->paginate(5);
        return view('barangmasuk.tabel', compact('header','toptitle'));
        //return view('landingpage.layout');
    }

    public function tambah()
    {
        $toptitle = "Tambah Data Barang masuk";
        $header = false;
        return view('barangmasuk.tambah', compact('header','toptitle'));
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
        $tujuan_upload = 'images/Barangmasuk';
        $gambar->move($tujuan_upload,$namafile);

        $judulnya = $request->judul;
        //SlugService::createSlug(Post::class, 'slug', $post->title);

        Barangmasuks::create([
            'judul' => $request->judul,
            'slug' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        if($gambar){
            return redirect('admin/barangmasuk')->with('success','Data berhasil disimpan');
        }
        else{
            return redirect()->back()->withInput()->withErrors($request->all())->with('error','Data gagal disimpan, cek kembali form anda');
        }
    }


    public function ubah($id)
    {
        $Barangmasuks = Barangmasuks::find($id);
        $toptitle = "Ubah Data Barangmasuk";
        return view('barangmasuk.ubah', ['dataubah' => $Barangmasuks,'toptitle' => $toptitle]);
    }


    public function update(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png'
        ]);

        $id = $request->id;
        $Barangmasuks = Barangmasuks::find($id);
        $gambar = $request->gambar;
        if($gambar){
            $namafile = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'images/barang';
            $gambar->move($tujuan_upload,$namafile);
        }
        else{
            $namafile = $Barangmasuks->gambar;
        }

        Barangmasuks::whereId($id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        return redirect('admin/barangmasuk')->with('success','Data berhasil diubah');
    }


    public function hapus($id)
    {
        $Barangmasuks = Barangmasuks::find($id);
        $namafile = $Barangmasuks->gambar;
        File::delete('/images/barang/'.$namafile);
        if($Barangmasuks->delete()){
            return redirect('admin/barangmasuk')->with('success','Data berhasil dihapus');
        }
        else{
            return redirect('admin/barangmasuk')->with('error','Data gagal dihapus');
        }
    }
}
