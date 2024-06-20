<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acaras;
use App\Models\Barangs;
use App\Models\Pengalamans;
class LandingPageController extends Controller
{
    //
    public function index()
    {

        $berita = "Berita";
        $acara = "Apa Yang Terjadi";
        $header = true;
        $judulpengalaman = "Pengalaman Mereka.";

        return view('Landingpage.Index', compact('judulpengalaman', 'berita', 'acara','header'));
    }

    public function pengalaman(){

        $judulpengalaman = "Pengalaman Mereka.";
        $detailjudulhalaman = "TEMUKAN CERITA YANG LAIN.";

        // Pengaturan
        $header = false;
        $ceritalain = false;
        $navhalaman = true;

        $pengalaman = Pengalamans::get();

        // @include('detail-pengalaman.component-detail')

        return view('detail-pengalaman.index', compact('judulpengalaman', 'detailjudulhalaman', 'header','ceritalain','navhalaman','pengalaman'));
    }
}

