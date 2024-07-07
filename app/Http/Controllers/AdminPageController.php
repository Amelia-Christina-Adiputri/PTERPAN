<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kendaraan;
use App\Pengajuan;
use App\Laporan;
use Illuminate\Support\Facades\DB;

class AdminPageController extends Controller
{
    // NAVIGASI
    public function a_home()
    {
        $pengajuan = DB::select(DB::raw("
        SELECT  id_pengajuan, id_user, u.id_unit, nm_unit, name as nama_user, tgl_brngkt, tgl_plng, p.kapasitas, tujuan, keterangan, status
        FROM pengajuan p LEFT JOIN users u
        ON p.id_user = u.id LEFT JOIN unit un
        ON u.id_unit = un.id_unit LEFT JOIN kendaraan k
        ON p.id_kendaraan = k.id_kendaraan
        WHERE status = 'Menunggu'
        ORDER BY id_pengajuan DESC;"));
        $jadwal = DB::select(DB::raw("
        SELECT id_pengajuan, id_user, nm_unit, u.name as nama_user, id_driver, us.name as nama_driver, plat_nmr, tgl_brngkt, tgl_plng, p.kapasitas, tujuan, keterangan, status
        FROM pengajuan p LEFT JOIN users u
        ON p.id_user = u.id LEFT JOIN users us
        ON p.id_driver = us.id LEFT JOIN unit un
        ON us.id_unit = un.id_unit LEFT JOIN kendaraan k
        ON p.id_kendaraan = k.id_kendaraan
        WHERE status = 'Diterima'
        ORDER BY id_pengajuan DESC;"));
        return view ('a_home', ['key'=>'Home', 'pengajuan'=>$pengajuan, 'jadwal'=>$jadwal]);
    }

    public function a_driver()
    {
        $driver = User::orderBy('id', 'desc')->where('role', 'Driver')->get();
        return view ('a_driver', ['key'=>'Driver', 'driver'=>$driver]);
    }

    public function a_driver_filter(Request $request)
    {
        session_start();
        if($request->tgl_brngkt == "" && $request->tgl_plng == "")
        {
            $driver = DB::select(DB::raw("
            SELECT * FROM users
            WHERE role='Driver'
            ORDER BY id DESC"));
                return view ('a_driver', ['key'=>'Driver', 'driver'=>$driver]);
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
            return view('a_driver', ['key'=>'Driver', 'driver'=>$driver]);
        }
        else{
            return redirect('a_driver')->with('alert', 'Tanggal berangkat harus lebih kecil atau sama dengan tanggal pulang!');
        }
    }

    public function a_kendaraan()
    {
        $kendaraan = Kendaraan::orderBy('id_kendaraan', 'desc')->get();
        return view ('a_kendaraan', ['key'=>'Kendaraan', 'kendaraan'=>$kendaraan]);
    }
    public function a_kendaraan_filter(Request $request)
    {
        session_start();
        if($request->tgl_brngkt == "" && $request->tgl_plng == "")
        {
            $kendaraan = DB::select(DB::raw("
            SELECT * FROM kendaraan
            ORDER BY id_kendaraan DESC"));
            return view ('a_kendaraan', ['key'=>'Kendaraan', 'kendaraan'=>$kendaraan]);
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
            return view ('a_kendaraan', ['key'=>'Kendaraan', 'kendaraan'=>$kendaraan]);
        }
        else{
            return redirect('a_kendaraan')->with('alert', 'Tanggal berangkat harus lebih kecil atau sama dengan tanggal pulang!');
        }
    }

    public function a_pengajuan()
    {
        $pengajuan = DB::select(DB::raw("
        SELECT id_pengajuan, id_user, nm_unit, u.name as nama_user, id_driver, us.name as nama_driver, plat_nmr, tgl_brngkt, tgl_plng, p.kapasitas, tujuan, keterangan, status
        FROM pengajuan p LEFT JOIN users u
        ON p.id_user = u.id LEFT JOIN users us
        ON p.id_driver = us.id LEFT JOIN unit un
        ON us.id_unit = un.id_unit LEFT JOIN kendaraan k
        ON p.id_kendaraan = k.id_kendaraan
        ORDER BY id_pengajuan DESC"));
        return view ('a_pengajuan', ['key'=>'Pengajuan', 'pengajuan'=>$pengajuan]);
    }

    public function a_laporan()
    {
        $pengajuan = DB::select(DB::raw("
        SELECT id_pengajuan, id_user, nm_unit, u.name as nama_user, id_driver, us.name as nama_driver, plat_nmr, tgl_brngkt, tgl_plng, p.kapasitas, tujuan, keterangan, status
        FROM pengajuan p LEFT JOIN users u
        ON p.id_user = u.id LEFT JOIN users us
        ON p.id_driver = us.id LEFT JOIN unit un
        ON us.id_unit = un.id_unit LEFT JOIN kendaraan k
        ON p.id_kendaraan = k.id_kendaraan
        WHERE status = 'Diterima'
        ORDER BY id_pengajuan DESC;"));
        return view ('a_laporan', ['key'=>'Laporan', 'pengajuan'=>$pengajuan]);
    }

    public function a_detail_laporan($id_pengajuan)
    {
        $laporan = Laporan::orderBy('id_pengajuan', 'desc')->where('id_pengajuan',$id_pengajuan)->get();
        return view ('a_detail_laporan', ['key'=>'Laporan', 'laporan'=>$laporan]);
    }

    // CRUD DRIVER
    public function a_driver_tambah_driver()
    {
        return view ('a_driver_tambah_driver', ['key'=>'Driver']);
    }

    public function a_driver_insert(request $request)
    {
        $jns_sim=implode(",",$request->get('jns_sim'));
        User::create([
            'id_unit'=>"1",
            'name'=>$request->nm_driver,
            'jns_sim'=>$jns_sim
        ]);
        return redirect('/a_driver')->with('alert', 'Data telah berhasil ditambahkan!');
    }

    public function a_driver_ubah_driver($id_driver)
    {
        $driver = User::where('id',$id_driver)->first();
        return view('a_driver_ubah_driver', ['key'=>'Driver', 'driver'=>$driver]);
    }

    Public function a_driver_update($id_driver, Request $request){
        $jns_sim = implode(",", $request->jns_sim);
        $driver = User::find($id_driver);
        $driver->name = $request->nm_driver;
        $driver->jns_sim = $jns_sim;
        $driver->save();
        return redirect('a_driver')->with('alert', 'Data telah berhasil diubah!');
    }

    Public function a_driver_delete($id_driver){
        $driver=User::where('id',$id_driver);
        $driver->delete();
        return redirect('a_driver')->with('alert', 'Data telah berhasil dihapus!');
    }

    // CRUD KENDARAAN
    public function a_kendaraan_tambah_kendaraan()
    {
        return view ('a_kendaraan_tambah_kendaraan', ['key'=>'Kendaraan']);
    }

    public function a_kendaraan_insert(Request $request)
    {
        Kendaraan::create([
            'plat_nmr'=>$request->plat_nmr,
            'jenis'=>$request->jenis,
            'merk'=>$request->merk,
            'warna'=>$request->warna,
            'stnk'=>$request->stnk,
            'tahun'=>$request->tahun,
            'kapasitas'=>$request->kapasitas,
            'cc'=>$request->cc,
            'jns_sim'=>$request->jns_sim
        ]);
        return redirect('/a_kendaraan')->with('alert', 'Data telah berhasil ditambahkan!');
    }

    public function a_kendaraan_ubah_kendaraan($id_kendaraan)
    {
        $kendaraan = Kendaraan::find($id_kendaraan);
        return view('a_kendaraan_ubah_kendaraan', ['key'=>'Kendaraan', 'kendaraan'=>$kendaraan]);
    }

    Public function a_kendaraan_update($plat_nmr, Request $request){
        $kendaraan = Kendaraan::find($plat_nmr);
        $kendaraan->jenis = $request->jenis;
        $kendaraan->merk = $request->merk;
        $kendaraan->warna = $request->warna;
        $kendaraan->stnk = $request->stnk;
        $kendaraan->tahun = $request->tahun;
        $kendaraan->kapasitas = $request->kapasitas;
        $kendaraan->cc = $request->cc;
        $kendaraan->jns_sim = $request->jns_sim;
        $kendaraan->save();
        return redirect('a_kendaraan')->with('alert', 'Data telah berhasil diubah!');
    }

    Public function a_kendaraan_delete($plat_nmr){
        $kendaraan=Kendaraan::where('plat_nmr',$plat_nmr);
        $kendaraan->delete();
        return redirect('a_kendaraan')->with('alert', 'Data telah berhasil dihapus!');
    }

    // CRUD PENGAJUAN
    public function a_home_terima_pengajuan($id_pengajuan)
    {
        $pengajuan = DB::select(DB::raw("
        SELECT id_pengajuan, id_user, u.id_unit, nm_unit, name as nama_user, tgl_brngkt, tgl_plng, kapasitas, tujuan, keterangan, status
        FROM pengajuan p join users u
        on p.id_user = u.id
        join unit un
        on u.id_unit=un.id_unit
        WHERE id_pengajuan='".$id_pengajuan."';"))[0];

        $kendaraan = DB::select(DB::raw("
        SELECT * FROM kendaraan
        WHERE id_kendaraan NOT IN (
        SELECT id_kendaraan FROM pengajuan
        WHERE status='Diterima' AND
        (('$pengajuan->tgl_brngkt' >= tgl_brngkt AND '$pengajuan->tgl_brngkt' <= tgl_plng) OR
        ('$pengajuan->tgl_plng' >= tgl_brngkt AND '$pengajuan->tgl_plng' <= tgl_plng) OR
        (tgl_brngkt>='$pengajuan->tgl_brngkt' AND tgl_plng<='$pengajuan->tgl_plng')))
        AND kapasitas >= $pengajuan->kapasitas"));

        $driver = DB::select(DB::raw("
        SELECT * FROM users
        WHERE id NOT IN (
        SELECT id_driver FROM pengajuan
        WHERE status='Diterima' AND
        (('$pengajuan->tgl_brngkt' >= tgl_brngkt AND '$pengajuan->tgl_brngkt' <= tgl_plng) OR
        ('$pengajuan->tgl_plng' >= tgl_brngkt AND '$pengajuan->tgl_plng' <= tgl_plng) OR
        (tgl_brngkt>='$pengajuan->tgl_brngkt' AND tgl_plng<='$pengajuan->tgl_plng')))
        AND role='Driver'"));
        return view('a_terima_pengajuan', ['key'=>'Home', 'pengajuan'=>$pengajuan, 'kendaraan'=>$kendaraan, 'driver'=>$driver]);
    }

    public function a_pengajuan_tambah_pengajuan()
    {
        $pengguna = User::where('role', 'user')->get();
        $driver = User::where('role', 'driver')->get();
        $kendaraan = Kendaraan::all();
        return view ('a_pengajuan_tambah_pengajuan', ['key'=>'Pengajuan', 'pengguna'=>$pengguna, 'driver'=>$driver, 'kendaraan'=>$kendaraan]);
    }

    public function a_terima_pengajuan_update($id_pengajuan, Request $request)
    {
        $pengajuan = Pengajuan::find($id_pengajuan);
        $pengajuan->id_driver = $request->id_driver;
        $pengajuan->id_kendaraan = $request->id_kendaraan;
        $pengajuan->status = "Diterima";
        $pengajuan->save();
        return redirect('/a_home')->with('alert', 'Data telah berhasil diubah!');
    }

    public function a_pengajuan_insert(request $request)
    {
        Pengajuan::create([
            'id_user'=>$request->id_user,
            'id_driver'=>$request->id_driver,
            'plat_nmr'=>$request->plat_nmr,
            'tgl_brngkt'=>$request->tgl_brngkt,
            'tgl_plng'=>$request->tgl_plng,
            'kapasitas'=>$request->kapasitas,
            'tujuan'=>$request->tujuan,
            'keterangan'=>$request->keterangan,
            'status'=>"Diterima"
        ]);
        return redirect('/a_pengajuan')->with('alert', 'Data telah berhasil ditambahkan!');
    }

    public function a_pengajuan_ubah_pengajuan($id_pengajuan)
    {
        $pengajuan = DB::select(DB::raw("
        SELECT id_pengajuan, u.id_unit, un.nm_unit as nama_unit, p.id_user, u.name as nama_user, p.id_driver,
        us.name as nama_driver, tgl_brngkt, tgl_plng, p.kapasitas, tujuan, keterangan, status, p.id_kendaraan, k.plat_nmr
        FROM pengajuan p LEFT JOIN kendaraan k
        ON p.id_kendaraan = k.id_kendaraan LEFT JOIN users u
        ON p.id_user = u.id LEFT JOIN users us
        ON p.id_driver = us.id LEFT JOIN unit un
        ON u.id_unit = un.id_unit
        WHERE id_pengajuan = $id_pengajuan;"))[0];
        $kendaraan = DB::select(DB::raw("
        SELECT * FROM kendaraan
        WHERE id_kendaraan NOT IN (
        SELECT id_kendaraan FROM pengajuan
        WHERE status='Diterima' AND
        (('$pengajuan->tgl_brngkt' >= tgl_brngkt AND '$pengajuan->tgl_brngkt' <= tgl_plng) OR
        ('$pengajuan->tgl_plng' >= tgl_brngkt AND '$pengajuan->tgl_plng' <= tgl_plng) OR
        (tgl_brngkt>='$pengajuan->tgl_brngkt' AND tgl_plng<='$pengajuan->tgl_plng')))
        AND kapasitas >= $pengajuan->kapasitas"));

        $driver = DB::select(DB::raw("
        SELECT * FROM users
        WHERE id NOT IN (
        SELECT id_driver FROM pengajuan
        WHERE status='Diterima' AND
        (('$pengajuan->tgl_brngkt' >= tgl_brngkt AND '$pengajuan->tgl_brngkt' <= tgl_plng) OR
        ('$pengajuan->tgl_plng' >= tgl_brngkt AND '$pengajuan->tgl_plng' <= tgl_plng) OR
        (tgl_brngkt>='$pengajuan->tgl_brngkt' AND tgl_plng<='$pengajuan->tgl_plng')))
        AND role='Driver'"));
        return view('a_pengajuan_ubah_pengajuan', ['key'=>'Pengajuan', 'pengajuan'=>$pengajuan, 'kendaraan'=>$kendaraan, "driver"=>$driver]);
    }

    Public function a_pengajuan_update($id_pengajuan, Request $request){
        $pengajuan = Pengajuan::find($id_pengajuan);
        $pengajuan->id_pengajuan = $request->id_pengajuan;
        $pengajuan->id_driver = $request->id_driver;
        $pengajuan->id_kendaraan = $request->id_kendaraan;
        $pengajuan->tgl_brngkt = $request->tgl_brngkt;
        $pengajuan->tgl_plng = $request->tgl_plng;
        $pengajuan->kapasitas = $request->kapasitas;
        $pengajuan->tujuan = $request->tujuan;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->status = $request->status;
        $pengajuan->save();
        return redirect('/a_pengajuan')->with('alert', 'Data telah berhasil diubah!');
    }



    Public function a_pengajuan_delete($id_pengajuan){
        $pengajuan=Pengajuan::where('id_pengajuan',$id_pengajuan);
        $pengajuan->delete();
        return redirect('a_pengajuan')->with('alert', 'Data telah berhasil dihapus!');
    }

    Public function a_home_tolak($id_pengajuan, Request $request){
        $pengajuan=Pengajuan::find($id_pengajuan);
        $pengajuan->status = "Ditolak";
        $pengajuan->keterangan = ' Alasan penolakan: '.$request->alasan;
        $pengajuan->save();
        return redirect('a_home')->with('alert', 'Pengajuan telah berhasil ditolak!');
    }

    public function register(){
        $unit = DB::select(DB::raw("
        SELECT * FROM unit"));
        return view('register',['key'=>'Register', 'unit'=>$unit]);
    }

    public function simpan(Request $request){
        User::create([
            'role'=>$request->role,
            'id_unit'=>$request->id_unit,
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password)
        ]);
        return redirect('/register');
    }

}
