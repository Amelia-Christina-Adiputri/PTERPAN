<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\Kendaraan;
use App\Pengajuan;
use App\User;
use Illuminate\Support\Facades\DB;

class PenggunaPageController extends Controller
{
    public function p_home()
    {
        session_start();
        $pengajuan = Pengajuan::orderBy('id_pengajuan','DESC')->where('id_user', $_SESSION["id"])->get();
        return view ('p_home', ['key'=>'Home', 'pengajuan'=>$pengajuan]);
    }

    public function p_driver()
    {
        $driver = User::orderBy('id','DESC')->where('role','Driver')->get();
        return view ('p_driver', ['key'=>'Driver','driver'=>$driver]);
    }
    public function p_driver_filter(Request $request)
    {
        session_start();
        if($request->tgl_brngkt == "" && $request->tgl_plng == "")
        {
            $driver = DB::select(DB::raw("
            SELECT * FROM users
            WHERE role='Driver'
            ORDER BY id DESC"));
                return view ('p_driver', ['key'=>'Driver', 'driver'=>$driver]);
            }
        else if($request->tgl_brngkt <= $request->tgl_plng)
        {
            $driver = DB::select(DB::raw("
            SELECT * FROM users
            WHERE id NOT IN (
            SELECT id_driver FROM pengajuan
            WHERE status='Diterima' AND
            (('$request->tgl_brngkt' >= tgl_brngkt AND '$request->tgl_brngkt' <= tgl_plng) OR
            ('$request->tgl_plng' >= tgl_brngkt AND '$request->tgl_plng' <= tgl_plng) OR
            (tgl_brngkt>='$request->tgl_brngkt' AND tgl_plng<='$request->tgl_plng')))
            AND role='Driver'
            ORDER BY id DESC;"));
            return view('p_driver', ['key'=>'Driver', 'driver'=>$driver]);
        }
        else{
            return redirect('p_driver')->with('alert', 'Tanggal berangkat harus lebih kecil atau sama dengan tanggal pulang!');
        }
    }

    public function p_kendaraan()
    {
        $kendaraan = Kendaraan::orderBy('id_kendaraan','DESC')->get();
        return view ('p_kendaraan', ['key'=>'Kendaraan', 'kendaraan'=>$kendaraan]);
    }

    public function p_kendaraan_filter(Request $request)
    {
        session_start();
        if($request->tgl_brngkt == "" && $request->tgl_plng == "")
        {
            $kendaraan = DB::select(DB::raw("
            SELECT * FROM kendaraan
            ORDER BY id_kendaraan DESC"));
            return view ('p_kendaraan', ['key'=>'Kendaraan', 'kendaraan'=>$kendaraan]);
            }
        else if($request->tgl_brngkt <= $request->tgl_plng)
        {
            $kendaraan = DB::select(DB::raw("
            SELECT * FROM kendaraan
            WHERE id_kendaraan NOT IN (
            SELECT id_kendaraan FROM pengajuan
            WHERE status='Diterima' AND
            (('$request->tgl_brngkt' >= tgl_brngkt AND '$request->tgl_brngkt' <= tgl_plng) OR
            ('$request->tgl_plng' >= tgl_brngkt AND '$request->tgl_plng' <= tgl_plng) OR
            (tgl_brngkt>='$request->tgl_brngkt' AND tgl_plng<='$request->tgl_plng')))
            ORDER BY id_kendaraan DESC"));
            return view ('p_kendaraan', ['key'=>'Kendaraan', 'kendaraan'=>$kendaraan]);
        }
        else{
            return redirect('p_kendaraan')->with('alert', 'Tanggal berangkat harus lebih kecil atau sama dengan tanggal pulang!');
        }
    }

    public function p_pengajuan_tambah_pengajuan()
    {
        return view ('p_pengajuan_tambah_pengajuan', ['key'=>'Home']);
    }

    public function p_pengajuan_insert(request $request)
    {
        session_start();
        $pengajuan = Pengajuan::where('id_pengguna', $_SESSION["id"]);
        Pengajuan::create([
            'id_user'=>$_SESSION["id"],
            'tgl_brngkt'=>$request->tgl_brngkt,
            'tgl_plng'=>$request->tgl_plng,
            'kapasitas'=>$request->kapasitas,
            'tujuan'=>$request->tujuan,
            'keterangan'=>$request->keterangan,
            'status'=>'Menunggu'
        ]);
        return redirect('/p_home')->with('alert', 'Data telah berhasil ditambahkan!');
    }
}
