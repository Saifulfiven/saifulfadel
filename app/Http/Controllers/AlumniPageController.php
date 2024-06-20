<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StepSatu;
use App\Models\StepDua;
use App\Models\StepTiga;
use App\Models\StepTigaDua;
use Illuminate\Support\Facades\DB; // Import DB class

class AlumniPageController extends Controller
{
    //
    
    public function index()
    {
        
        $toptitle = "Dashboard - Alumni";
        $header = false;
        
        $alumnis = DB::table('step_satus')
        ->join('step_duas', 'step_satus.id', '=', 'step_duas.id_stepSatu')
        ->join('step_tigas', 'step_satus.id', '=', 'step_tigas.id_stepSatu')
        ->join('step_tiga_duas', 'step_satus.id', '=', 'step_tiga_duas.id_stepSatu')
        // ->join('kandidats', 'kabupatens.id_kandidat', '=', 'kandidats.id')
        // ->join('timpenggunas', 'pemilihs.id_timpengguna', '=', 'timpenggunas.id')
        ->select('step_satus.id','step_satus.nim','step_satus.namalengkap','step_satus.kontak',
                 'step_duas.*','step_tigas.*','step_tiga_duas.*')->get();

        return view('alumni.tabel', compact('header','toptitle','alumnis'));
        //return view('landingpage.layout');
    }

}