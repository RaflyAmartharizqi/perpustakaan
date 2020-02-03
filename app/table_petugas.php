<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class table_petugas extends Authenticable implements JWTSubject
{
    use notifiable;
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $table='table_petugas';

    protected $fillable =
    [
        'nama_petugas','alamat','telp','username','password','level'
    ];
    protected $hidden = 
    [
        'password','remember_token',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return[];
    }
    public function peminjaman ()
    {
        return $this->hasMany ('App\table_peminjaman');
    }
   
}
