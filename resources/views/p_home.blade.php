@extends('layouts.p_main')
@section('title','Home')
@section('content')

<!-- ALERT -->
<div>
    @if(session('alert'))
        @if(session('alert')=='Data telah berhasil ditambahkan!')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('alert')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif
</div>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <br>
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Pengajuan</h3>
                </div>
                <div class="card-body">
                    <!-- BUTTON INSERT PENGAJUAN -->
                    <a href="/p_pengajuan/tambah_pengajuan" class="btn btn-dark" role="button">
                        <i class="bi bi-plus"></i>Pengajuan
                    </a>
                    <br><br>

                        <!-- TABEL PENGAJUAN -->
                        <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Tanggal Berangkat</th>
                            <th scope="col">Tanggal Pulang</th>
                            <th scope="col">Kapasitas</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pengajuan as $p)
                            <tr>
                                <td>{{$p->tgl_brngkt}}</td>
                                <td>{{$p->tgl_plng}}</td>
                                <td>{{$p->kapasitas}}</td>
                                <td>{{$p->tujuan}}</td>
                                <td>{{$p->keterangan}}</td>
                                <td>{{$p->status}}</td>
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
