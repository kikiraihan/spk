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

    //relasi
    public function penilaianAlternatif(){
        return $this->hasMany('App\Model\PenilaianAlternatif','id_preferensi');//boleh null
    }

    public function scopeWhereHavePenilaianThatIdPenilai($query,$idPenilai)
    {
        //whereHas,Has mengembalikan query.
        //contains mengembalikan boolean.
        //$q yg di pass berarti mengambil objek parent dari parent itu sendiri,
        //sehingga seperti menambah skrip ke dalam parent.

        return $query
            // ->with(['PenilaianAlternatif'])
            ->whereHas('PenilaianAlternatif',function($q) use($idPenilai){
                $q
                ->where('id_penilai', $idPenilai);
            });
            //user yang berelasi ormawa dan mahasiswa, dan memiliki nama $idPenilai di masing2 model
    }

    public function scopeWhereHavePenilaianThatNotIdPenilaiOrDoesntHavePenilaian($query,$idPenilai,$sukses)
    {

        return $query
            // ->with(['PenilaianAlternatif'])
            // ->whereHas('PenilaianAlternatif',function($q) use($idPenilai){
            //     $q
            //     ->where('id_penilai',"<>",$idPenilai)
            //     // ->whereNotIn('id_penilai', [$idPenilai])
            //     ;
            // })
            ->whereDoesntHave('PenilaianAlternatif')
            ->orWhereNotIn('id',$sukses)
            ;


            //user yang berelasi ormawa dan mahasiswa, dan memiliki nama $idPenilai di masing2 model
    }


}
