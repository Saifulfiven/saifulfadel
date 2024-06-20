<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengalamans;

class PengalamanPageController extends Controller
{
    // Landing Page
    public function index()
    {
        //$products = Product::latest()->paginate(5);
        //$pengalaman = pengalaman::latest()->paginate(5);
        //$kegiatan = Kegiatan::latest()->paginate(5);
        $pengalaman = "pengalaman";
        $header = false;
        return view('pengalaman.index', compact('pengalaman','header'));
        //return view('landingpage.layout');
    }


    //Dashboard

    public function home()
    {
        //$products = Product::latest()->paginate(5);
        //$pengalaman = pengalaman::latest()->paginate(5);
        //$kegiatan = Kegiatan::latest()->paginate(5);
        $toptitle = "Dashboard - Pengalaman";
        $header = false;
        $pengalamans = pengalamans::latest()->paginate(5);
        return view('pengalaman.tabel', compact('header','toptitle','pengalamans'));
        //return view('landingpage.layout');
    }

    public function tambah()
    {
        //$products = Product::latest()->paginate(5);
        //$pengalaman = pengalaman::latest()->paginate(5);
        //$kegiatan = Kegiatan::latest()->paginate(5);
        $toptitle = "Tambah Data pengalaman";
        $header = false;
        return view('pengalaman.tambah', compact('header','toptitle'));
        //return view('landingpage.layout');
    }


    public function simpan(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'nama' => 'required',
            'programstudi' => 'required',
            'angkatan' => 'nullable',
            'jabatan' => 'nullable',
            'pekerjaan' => 'nullable',
            'detail' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png'
        ]);
        
        //upload foto
        $foto = $request->foto;
        $namafile = time()."_".$foto->getClientOriginalName();
        $tujuan_upload = 'images/pengalaman';
        $foto->move($tujuan_upload,$namafile);

        $judulnya = $request->judul;
        //SlugService::createSlug(Post::class, 'slug', $post->title);

        pengalamans::create([
            'judul' => $request->judul,
            'nama' => $request->nama,
            'programstudi' => $request->programstudi,
            'angkatan' => $request->angkatan,
            'jabatan' => $request->jabatan,
            'pekerjaan' => $request->pekerjaan,
            'detail' => $request->detail,
            'foto' => $namafile
        ]);

        if($foto){
            return redirect('admin/pengalaman/home')->with('success','Data berhasil disimpan');
        }
        else{
            return redirect()->back()->withInput()->withErrors($request->all())->with('error','Data gagal disimpan, cek kembali form anda');
        }
    }

    
    public function ubah($id)
    {
        $pengalamans = pengalamans::find($id);
        $toptitle = "Ubah Data pengalaman";
        return view('pengalaman.ubah', ['dataubah' => $pengalamans,'toptitle' => $toptitle]);
    }


    public function update(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'nama' => 'required',
            'programstudi' => 'required',
            'angkatan' => 'nullable',
            'jabatan' => 'nullable',
            'pekerjaan' => 'nullable',
            'detail' => 'nullable',
            'foto' => 'image|mimes:jpeg,jpg,png'
        ]);

        $id = $request->id;
        $pengalamans = pengalamans::find($id);
        $foto = $request->foto;
        if($foto){
            $namafile = time()."_".$foto->getClientOriginalName();
            $tujuan_upload = 'images/pengalaman';
            $foto->move($tujuan_upload,$namafile);
        }
        else{
            $namafile = $pengalamans->foto;
        }

        pengalamans::whereId($id)->update([
            'judul' => $request->judul,
            'nama' => $request->nama,
            'programstudi' => $request->programstudi,
            'angkatan' => $request->angkatan,
            'jabatan' => $request->jabatan,
            'pekerjaan' => $request->pekerjaan,
            'detail' => $request->detail,
            'foto' => $namafile
        ]);

        return redirect('admin/pengalaman/home')->with('success','Data berhasil diubah');
    }


    public function hapus($id)
    {
        $pengalamans = pengalamans::find($id);
        $namafile = $pengalamans->foto;
        File::delete('/images/pengalaman/'.$namafile);
        if($pengalamans->delete()){
            return redirect('admin/pengalaman/home')->with('success','Data berhasil dihapus');
        }
        else{
            return redirect('admin/pengalaman/home')->with('error','Data gagal dihapus');
        }
    }
}
