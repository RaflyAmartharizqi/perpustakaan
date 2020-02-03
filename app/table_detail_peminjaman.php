<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class table_detail_peminjaman extends Model
{
    protected $table = 'table_detail_peminjaman';
    protected $primaryKey ='id';
    public $timestamps = false;
    protected $fillable = 
    [
        'id_pinjam','id_buku','qty'
    ];
    public function peminjaman ()
    {
        return $this->belongsTo ('App\table_peminjaman');
    }
    public function buku ()
    {
        return $this->belongsTo ('App\table_buku');
    }
}
