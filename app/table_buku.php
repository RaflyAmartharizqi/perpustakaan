<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class table_buku extends Model
{
    protected $table='table_buku';
    protected $fillable=[
        'judul','pengarang','penerbit','foto'
    ];
    protected $primaryKey='id';
    public $timestamps=false;

    public function detail_peminjaman ()
    {
        return $this->hasMany ('App\table_detail_peminjaman');
    }
}

