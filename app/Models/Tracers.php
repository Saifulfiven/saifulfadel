<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracers extends Model
{
    use HasFactory;
    protected $fillable = [
        'nimhsmsmh',
            'tahun_lulus',
            'nmmhsmsmh',
            'emailmsmh',
            'npwp',
            'kdptimsmh',
            'kdpstmsmh',
            'telpomsmh',
            'nik',
            //Kuesioner Wajib
            'f8',
            'f502',
            'f505',
            'f5a1',
            'f5a2',
            'f1101',
            'f1102',
            'f5b',
            'f5c',
            'f5d',
            //9
            'f18a',
            'f18b',
            'f18c',
            'f18d',
            //10
            'f1201',
            'f1202',
            //11
            'f14',
            //12
            'f15',
            
    ];
}
