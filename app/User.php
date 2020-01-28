<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
use Notifiable;
/**
* The attributes that are mass assignable.
*
* @var array
*/
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
return [];
}
}