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
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function penilaianAlternatif(){
        return $this->hasMany('App\Model\PenilaianAlternatif','id_penilai');//boleh null
    }



    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] =  bcrypt($password);
    }

}
