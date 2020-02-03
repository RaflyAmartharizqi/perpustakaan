<?php

namespace App\Http\Controllers;
use App\table_peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    public function store(Request $req)
    {        $validator=Validator::make($req->all(),
        [
            'tgl'=>'required',
            'id_anggota'=>'required',
            'id_petugas'=>'required',
            'tgl_deadline'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=table_peminjaman::create([
            'tgl'=>$req->tgl,
            'id_anggota'=>$req->id_anggota,
            'id_petugas'=>$req->id_petugas,
            'tgl_deadline'=>$req->tgl_deadline,
            'denda'=>$req->denda
        ]);
        if($simpan)
        {
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'tgl'=>'required',
            'id_anggota'=>'required',
            'id_petugas'=>'required',
            'tgl_deadline'=>'required',
            'denda'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=table_peminjaman::where('id',$id)->update([
            'tgl'=>$req->tgl,
            'id_anggota'=>$req->id_anggota,
            'id_petugas'=>$req->id_petugas,
            'tgl_deadline'=>$req->tgl_deadline,
            'denda'=>$req->denda
        ]);
        if($ubah)
        {
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
    public function destroy($id)
    {
        $hapus=table_peminjaman::where('id',$id)->delete();
        if($hapus)
        {
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
}
