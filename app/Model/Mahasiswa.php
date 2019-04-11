<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $fillable = [
        'nama' ,
        'jurusan',
        'alamat',
        'agama',
        'toefl',
        'ipk',
        'masak',
        'kecantikan',
    ];


    //relasi
    public function penilaianAlternatif(){
        return $this->hasMany('App\Model\PenilaianAlternatif','id_mahasiswa');//boleh null
    }

}
