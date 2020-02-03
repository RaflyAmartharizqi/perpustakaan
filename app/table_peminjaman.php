<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class table_peminjaman extends Model
{
    protected $table = 'table_peminjaman';
    protected $primaryKey ='id';
    public $timestamps = false;
    protected $fillable = 
    [
        'tgl','id_anggota','id_petugas','tgl_deadline'
    ];
    public function anggota ()
    {
        return $this->belongsTo ('App\table_anggota');
    }
    public function petugas ()
    {
        return $this->belongsTo ('App\table_petugas');
    }
    public function detail_peminjaman ()
    {
        return $this->hasOne ('App\table_detail_peminjaman');
    }
}