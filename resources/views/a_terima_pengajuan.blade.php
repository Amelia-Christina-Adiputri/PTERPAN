@extends('layouts.a_main')
@section('title','Terima Pengajuan')
@section('content')

<br>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="container-fluid d-flex justify-content-center align-items-top">
                <div class="card w-100">
                    <div class="card-header bg-dark d-flex justify-content-left">
                        <strong Class="text-light">TERIMA PENGAJUAN</strong>
                    </div>
                    <div class="card-body">
                        <!-- DATA PENGAJUAN -->
                        <h4>Data Pengajuan</h4>
                        <table class="w-auto">
                            <tr>
                                <td>Nama User</td>
                                <td> : </td>
                                <td>{{$pengajuan->nama_user}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Berangkat</td>
                                <td> : </td>
                                <td>{{$pengajuan->tgl_brngkt}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Pulang</td>
                                <td> : </td>
                                <td>{{$pengajuan->tgl_plng}}</td>
                            </tr>
                            <tr>
                                <td>Kapasitas</td>
                                <td> : </td>
                                <td>{{$pengajuan->kapasitas}}</td>
                            </tr>
                            <tr>
                                <td>Tujuan</td>
                                <td> : </td>
                                <td>{{$pengajuan->tujuan}}</td>
                            </tr>
                        </table>

                        <br><br>

                        <h4>Penjadwalan</h4>

                        <!-- FORM TERIMA PENGAJUAN-->
                        <form action="/a_home/terima_pengajuan/update/{{$pengajuan->id_pengajuan}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group w-25">
                                <label>ID Driver</label>
                                <select name="id_driver" class="form-control">
                                    <option value="">--Driver--</option>
                                    @foreach($driver as $d)
                                        <option value="{{$d->id}}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-25">
                                <label>Plat Nomor</label>
                                <select name="id_kendaraan" class="form-control">
                                    <option value="">--Plat Nomor--</option>
                                    @foreach($kendaraan as $k)
                                        <option value="{{$k->id_kendaraan}}">{{$k->plat_nmr}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <a href="/a_home" type="button" class="btn btn-secondary">Batal</a>
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
