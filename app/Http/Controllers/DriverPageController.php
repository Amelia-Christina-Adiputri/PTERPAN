<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengajuan;
use App\Laporan;
use App\User;
use Illuminate\Support\Facades\DB;

class DriverPageController extends Controller
{
    public function d_home()
    {
        session_start();
        $pengajuan = DB::select(DB::raw("
        SELECT id_pengajuan, id_user, nm_unit, u.name as nama_user, id_driver, us.name as nama_driver, plat_nmr, tgl_brngkt, tgl_plng, p.kapasitas, tujuan, keterangan, status
        FROM pengajuan p LEFT JOIN users u
        ON p.id_user = u.id LEFT JOIN users us
        ON p.id_driver = us.id LEFT JOIN unit un
        ON us.id_unit = un.id_unit LEFT JOIN kendaraan k
        ON p.id_kendaraan = k.id_kendaraan
        WHERE status = 'Diterima'
        AND id_driver= ".$_SESSION["id"].";"));
        return view ('d_home', ['key'=>'Home', 'pengajuan'=>$pengajuan]);
    }

    public function d_laporan($id_pengajuan)
    {
        $laporan = Laporan::where('id_pengajuan',$id_pengajuan)->get();
        return view ('d_laporan', ['key'=>'Home', 'laporan'=>$laporan, 'id_pengajuan'=>$id_pengajuan]);
    }


    public function d_laporan_tambah_laporan($id_pengajuan)
    {
        $laporan = Laporan::where('id_pengajuan',$id_pengajuan);
        return view ('d_laporan_tambah_laporan', ['key'=>'Home', 'laporan'=>$laporan, 'id_pengajuan'=>$id_pengajuan]);
    }

    public function d_laporan_insert($id_pengajuan, Request $request)
    {
        Laporan::create([
            'id_pengajuan'=>$id_pengajuan,
            'waktu'=>$request->waktu,
            'keterangan'=>$request->keterangan,
            'lokasi'=>$request->lokasi,
            'wkt_isi'=>date('Y-m-d H:i:s'),
        ]);
        return redirect ('/d_laporan/'.$id_pengajuan);
    }

    public function d_data_diri()
    {
        session_start();
        $driver = User::find($_SESSION["id"]);
        return view ('d_data_diri', ['key'=>'Data Diri', 'driver'=>$driver]);
    }

    public function d_data_diri_ubah()
    {
        session_start();
        $driver = User::find($_SESSION["id"]);
        return view ('d_data_diri_ubah_data_diri', ['key'=>'Data Diri', 'driver'=>$driver]);
    }

    Public function d_data_diri_update(Request $request){
        $jns_sim = implode(",", $request->jns_sim);
        session_start();
        $driver = User::find($_SESSION["id"]);
        $driver->name = $request->nm_driver;
        $driver->jns_sim = $jns_sim;
        $driver->save();
        return redirect('d_data_diri')->with('alert', 'Data telah berhasil diubah!');
    }
}
