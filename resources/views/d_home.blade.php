@extends('layouts.d_main')
@section('title','Home')
@section('content')

<br>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Jadwal</h3>
                </div>
                <div class="card-body">
                    <!-- TABEL PENGAJUAN -->
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Nama User</th>
                            <th scope="col">Nama Driver</th>
                            <th scope="col">Plat Nomor</th>
                            <th scope="col">Tanggal Berangkat</th>
                            <th scope="col">Tanggal Pulang</th>
                            <th scope="col">Kapasitas</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Laporan</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pengajuan as $p)
                            <tr>
                                <td>{{$p->nama_user}}</td>
                                <td>{{$p->nama_driver}}</td>
                                <td>{{$p->plat_nmr}}</td>
                                <td>{{$p->tgl_brngkt}}</td>
                                <td>{{$p->tgl_plng}}</td>
                                <td>{{$p->kapasitas}}</td>
                                <td>{{$p->tujuan}}</td>
                                <td>{{$p->keterangan}}</td>
                                <td><a href="/d_laporan/{{$p->id_pengajuan}}" class="btn btn-warning" role="button"><i class="bi bi-journals"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
