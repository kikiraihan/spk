<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;
    protected $guard_name="web";


    protected $fillable = [
        'kategori', 'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    //relasi
    public function penilaianAlternatif(){
        return $this->hasMany('App\Model\PenilaianAlternatif','id_penilai');//boleh null
    }



    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] =  bcrypt($password);
    }

    public function scopeWherePenilaiBelumMenginput($query,$id_preferensi){
        return $query->whereHas('PenilaianAlternatif',function($q) use($id_preferensi){
            $q
            ->where('id_preferensi', '<>', $id_preferensi);
        })
        ->where('kategori','Penilai')
        ->orWhereDoesntHave('PenilaianAlternatif')
        ->where('kategori','Penilai');
    }

    public function scopeWherePenilaiSudahMenginput($query,$id_preferensi){
        $hasil=$query->whereHas('PenilaianAlternatif',function($q) use($id_preferensi){
            $q
            ->where('id_preferensi',  $id_preferensi);
        })
        ->get(['id']);
        // dd($hasil);
        $balik[]='';

        foreach($hasil as $h){
            $balik[]=$h->id;
        }

        return $balik;
    }

}
