<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PenilaianAlternatif extends Model
{


    protected $fillable = [
        'nilai',
        'id_penilai',
        'id_preferensi',
        'id_mahasiswa',
    ];


    //relasi
    public function penilai(){
        return $this->belongsTo('App\Model\User', 'id_penilai');//pasti ada
    }
    public function preferensi(){
        return $this->belongsTo('App\Model\CriteriaPreference', 'id_preferensi');//pasti ada
    }
    public function mahasiswa(){
        return $this->belongsTo('App\Model\Mahasiswa', 'id_mahasiswa');//pasti ada
    }

}
