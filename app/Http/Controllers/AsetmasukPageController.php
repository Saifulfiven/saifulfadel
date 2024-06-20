<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asetmasuks;

class asetmasukPageController extends Controller
{
    // Landing Page
    public function index()
    {
        //$asetmasuk = asetmasuk::latest()->paginate(5);
        $asetmasuk = "aset masuk";
        $header = false;
        return view('asetmasuk.index', compact('asetmasuk','header'));
        //return view('landingpage.layout');
    }


    //Dashboard

    public function home()
    {

        $toptitle = "Dashboard - asetmasuk";
        $header = false;
        //$asetmasuks = asetmasuks::latest()->paginate(5);
        return view('asetmasuk.tabel', compact('header','toptitle'));
        //return view('landingpage.layout');
    }

    public function tambah()
    {
        $toptitle = "Tambah Data aset masuk";
        $header = false;
        return view('asetmasuk.tambah', compact('header','toptitle'));
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
        $tujuan_upload = 'images/asetmasuk';
        $gambar->move($tujuan_upload,$namafile);

        $judulnya = $request->judul;
        //SlugService::createSlug(Post::class, 'slug', $post->title);

        asetmasuks::create([
            'judul' => $request->judul,
            'slug' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        if($gambar){
            return redirect('admin/asetmasuk')->with('success','Data berhasil disimpan');
        }
        else{
            return redirect()->back()->withInput()->withErrors($request->all())->with('error','Data gagal disimpan, cek kembali form anda');
        }
    }


    public function ubah($id)
    {
        $asetmasuks = asetmasuks::find($id);
        $toptitle = "Ubah Data asetmasuk";
        return view('asetmasuk.ubah', ['dataubah' => $asetmasuks,'toptitle' => $toptitle]);
    }


    public function update(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png'
        ]);

        $id = $request->id;
        $asetmasuks = asetmasuks::find($id);
        $gambar = $request->gambar;
        if($gambar){
            $namafile = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'images/aset';
            $gambar->move($tujuan_upload,$namafile);
        }
        else{
            $namafile = $asetmasuks->gambar;
        }

        asetmasuks::whereId($id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        return redirect('admin/asetmasuk')->with('success','Data berhasil diubah');
    }


    public function hapus($id)
    {
        $asetmasuks = asetmasuks::find($id);
        $namafile = $asetmasuks->gambar;
        File::delete('/images/aset/'.$namafile);
        if($asetmasuks->delete()){
            return redirect('admin/asetmasuk')->with('success','Data berhasil dihapus');
        }
        else{
            return redirect('admin/asetmasuk')->with('error','Data gagal dihapus');
        }
    }
}
