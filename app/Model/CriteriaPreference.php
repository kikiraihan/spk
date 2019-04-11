<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CriteriaPreference extends Model
{
    protected $fillable = [
        "judul",
        "ordo",
        "matriks",
        "matriksNormalised",
        "kriteria",
    ];

    public function penilaianAlternatif(){
        return $this->hasMany('App\Model\PenilaianAlternatif','id_preferensi');//boleh null
    }
}
