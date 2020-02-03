<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class table_anggota extends Model
{
    protected $table='table_anggota';
    protected $fillable=[
        'nama_anggota','alamat','telp'
    ];
    protected $primaryKey='id';
    public $timestamps=false;
    
    public function peminjaman ()
    {
        return $this->hasMany ('App\table_peminjaman');
    }
}
