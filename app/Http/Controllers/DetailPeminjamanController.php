<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\table_detail_peminjaman;
use Auth;
use DB;

class DetailPeminjamanController extends Controller
{
    public function index()
    {
            if(Auth::user()->level=="petugas")
            {
                $peminjaman=DB::table('table_peminjaman')
                ->join('table_anggota','table_anggota.id','=','table_peminjaman.id_anggota')
                ->join('table_petugas','table_petugas.id','=','table_peminjaman.id_petugas')
                ->select('table_peminjaman.id','table_peminjaman.id_anggota','table_anggota.nama_anggota',
                'table_peminjaman.id_petugas','table_peminjaman.tgl','table_peminjaman.tgl_deadline',
                'table_peminjaman.denda')
                ->get();
            
            $data=array();
            foreach ($peminjaman as $dt_pj)
            {
                $ok=table_detail_peminjaman::where('id_pinjam',$dt_pj->id)->get();
                $arr_detail=array();
                foreach ($ok as $p)
                {
                    $arr_detail[]=array(
                        'id_pinjam' => $p->id_pinjam,
                        'id_buku' => $p->id_buku,
                        'qty' => $p->qty 
                    );
                }
                $data[]=array(
                    'id' => $dt_pj->id_anggota,
                    'id_anggota' =>$dt_pj->id_anggota,
                    'nama_anggota' =>$dt_pj->nama_anggota,
                    'id_petugas' =>$dt_pj->id_petugas,
                    'tgl'=>$dt_pj->tgl,
                    'tgl_deadline'=>$dt_pj->tgl_deadline,
                    'detail_pinjam'=>$arr_detail
                );
            }
            return response()->json(compact("data"));
        } else {
            return response()->json(['status'=>'anda bukan petugas']);
        }
    }
    public function store(Request $req)
    {        $validator=Validator::make($req->all(),
        [
            'id_pinjam'=>'required',
            'id_buku'=>'required',
            'qty'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=table_detail_peminjaman::create([
            'id_pinjam'=>$req->id_pinjam,
            'id_buku'=>$req->id_buku,
            'qty'=>$req->qty
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
            'id_pinjam'=>'required',
            'id_buku'=>'required',
            'qty'=>'required',
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=table_detail_peminjaman::where('id',$id)->update([
            'id_pinjam'=>$req->id_pinjam,
            'id_buku'=>$req->id_buku,
            'qty'=>$req->qty
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
        $hapus=table_detail_peminjaman::where('id',$id)->delete();
        if($hapus)
        {
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }   
    public function tampil()
    {
        $data=DB::table('table_peminjaman')
        ->join('table_anggota','table_anggota.id','=','table_peminjaman.id_anggota')
        ->join('table_petugas','table_petugas.id','=','table_peminjaman.id_petugas')
        ->select('table_peminjaman.id','table_anggota.nama_anggota','table_anggota.alamat','table_anggota.telp',
        'table_petugas.nama_petugas','table_peminjaman.tgl','table_peminjaman.tgl_deadline','table_peminjaman.denda')
        ->get();
        $count=$data->count();
        $status=1;
        return response()->json(compact('data','status','count'));

    }
}
