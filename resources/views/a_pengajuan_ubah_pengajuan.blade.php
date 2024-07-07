@extends('layouts.a_main')
@section('title','Ubah Pengajuan')
@section('content')

<br>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="container-fluid d-flex justify-content-center align-items-top">
                <div class="card w-100">
                    <div class="card-header bg-dark d-flex justify-content-left">
                        <strong Class="text-light">UBAH DATA PENGAJUAN</strong>
                    </div>
                    <div class="card-body">
                        <!-- MODAL TAMBAH PENGAJUAN-->

                        <form action="/a_pengajuan/update/{{$pengajuan->id_pengajuan}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group w-50">
                                <label>Nama User</label>
                                <input type="text" name="id_user" class="form-control" value="{{$pengajuan->nama_user}}" readonly>
                            </div>
                            <div class="form-group w-50">
                                <label>Nama Unit</label>
                                <input type="text" name="id_unit" class="form-control" value="{{$pengajuan->nama_unit}}" readonly>
                            </div>
                            <div class="form-group w-50">
                                <label>Nama Driver</label>
                                <select name="id_driver" class="form-control">
                                    <option value="{{$pengajuan->id_driver}}">{{$pengajuan->nama_driver}}</option>
                                    @foreach($driver as $d)
                                        <option value="{{$d->id}}">{{$d->name}}</option>
                                    @endforeach
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Plat Nomor</label>
                                <select name="id_kendaraan" class="form-control">
                                    <option value="{{$pengajuan->id_kendaraan}}">{{$pengajuan->plat_nmr}}</option>
                                    @foreach($kendaraan as $k)
                                        <option value="{{$k->id_kendaraan}}">{{$k->plat_nmr}}</option>
                                    @endforeach
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Tanggal Berangkat</label>
                                <input type="datetime-local" name="tgl_brngkt" class="form-control" value="{{$pengajuan->tgl_brngkt}}">
                            </div>
                            <div class="form-group w-50">
                                <label>Tanggal Pulang</label>
                                <input type="datetime-local" name="tgl_plng" class="form-control" value="{{$pengajuan->tgl_plng}}">
                            </div>
                            <div class="form-group w-50">
                                <label>Kapasitas</label>
                                <input type="number" name="kapasitas" class="form-control" value="{{$pengajuan->kapasitas}}">
                            </div>
                            <div class="form-group w-50">
                                <label>Tujuan</label>
                                <input type="text" name="tujuan" class="form-control" value="{{$pengajuan->tujuan}}">
                            </div>
                            <div class="form-group w-50">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" value="{{$pengajuan->keterangan}}">
                            </div>
                            <div class="form-group w-50">
                                <label>Status</label>
                                <div class="form-group">
                                    <select name="status" class="select">
                                        <option value="Menunggu" {{ ($pengajuan->status == 'Menunggu') ? 'selected':''}}>Menunggu</option>
                                        <option value="Diterima" {{ ($pengajuan->status == 'Diterima') ? 'selected':''}}>Diterima</option>
                                        <option value="Ditolak" {{ ($pengajuan->status == 'Ditolak') ? 'selected':''}}>Ditolak</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <a href="/a_pengajuan"><button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button></a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
