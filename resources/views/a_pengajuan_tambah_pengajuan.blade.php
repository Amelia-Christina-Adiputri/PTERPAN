@extends('layouts.a_main')
@section('title','Tambah Pengajuan')
@section('content')

<br>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="container-fluid d-flex justify-content-center align-items-top">
                <div class="card w-100">
                    <div class="card-header bg-dark d-flex justify-content-left">
                        <strong Class="text-light">TAMBAH DATA PENGAJUAN</strong>
                    </div>
                    <div class="card-body">
                        <!-- FORM TAMBAH PENGAJUAN-->

                        <form action="/a_pengajuan/insert" method="POST">
                            @csrf
                            <div class="form-group w-50">
                                <label>Nama User</label>
                                <div class="form-group">
                                <select name="id_user" class="form-control">
                                    <option value="">--Pengguna--</option>
                                    @foreach($pengguna as $p)
                                        <option value="{{$p->id}}">{{$p->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="form-group w-50">
                                <label>Nama Driver</label>
                                <select name="id_driver" class="form-control">
                                    <option value="">--Driver--</option>
                                    @foreach($driver as $d)
                                        <option value="{{$d->id}}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Plat Nomor</label>
                                <select name="plat_nmr" class="form-control">
                                    <option value="">--Plat Nomor--</option>
                                    @foreach($kendaraan as $k)
                                        <option value="{{$k->id_kendaraan}}">{{$k->plat_nmr}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Tanggal Berangkat</label>
                                <input type="datetime-local" name="tgl_brngkt" class="form-control" placeholder="Masukkan Tanggal Berangkat">
                            </div>
                            <div class="form-group w-50">
                                <label>Tanggal Pulang</label>
                                <input type="datetime-local" name="tgl_plng" class="form-control" placeholder="Masukkan Tanggal Pulang">
                            </div>
                            <div class="form-group w-50">
                                <label>Kapasitas</label>
                                <input type="number" name="kapasitas" class="form-control" placeholder="Masukkan Kapasitas">
                            </div>
                            <div class="form-group w-50">
                                <label>Tujuan</label>
                                <input type="text" name="tujuan" class="form-control" placeholder="Masukkan Tujuan">
                            </div>
                            <div class="form-group w-50">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Tanggal Keterangan">
                            </div>
                            <div>
                                <a href="/a_pengajuan"><button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button></a>
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
