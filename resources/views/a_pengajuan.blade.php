@extends('layouts.a_main')
@section('title','Daftar Pengajuan')
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
            @elseif(session('alert')=='Data telah berhasil diubah!')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('alert')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @elseif(session('alert')=='Data telah berhasil dihapus!')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                    <h3>Daftar Pengajuan</h3>
                </div>
                <div class="card-body">

                    <!-- BUTTON INSERT PENGAJUAN -->
                    <a href="/a_pengajuan/tambah_pengajuan" class="btn btn-dark" role="button">
                        <i class="bi bi-plus"></i>Pengajuan
                    </a>
                    <br><br>

                    <h3>Menunggu</h3>
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
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pengajuan as $p)
                                @if($p->status=="Menunggu")
                                    <tr>
                                        <td>{{$p->nama_user}}</td>
                                        <td>{{$p->nama_driver}}</td>
                                        <td>{{$p->plat_nmr}}</td>
                                        <td>{{$p->tgl_brngkt}}</td>
                                        <td>{{$p->tgl_plng}}</td>
                                        <td>{{$p->kapasitas}}</td>
                                        <td>{{$p->tujuan}}</td>
                                        <td>{{$p->keterangan}}</td>
                                        <td>{{$p->status}}</td>
                                        <td>
                                        <a href="a_pengajuan/ubah_pengajuan/{{$p->id_pengajuan}}" class="btn btn-warning" role="button"><i class="bi bi-pencil-square"></i></a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus?')" href="/a_pengajuan/delete/{{$p->id_pengajuan}}" class="btn btn-danger" role="button"><i class="bi bi-x-square"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <br>

                    <h3>Diterima</h3>
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
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pengajuan as $p)
                                @if($p->status=="Diterima")
                                    <tr>
                                        <td>{{$p->nama_user}}</td>
                                        <td>{{$p->nama_driver}}</td>
                                        <td>{{$p->plat_nmr}}</td>
                                        <td>{{$p->tgl_brngkt}}</td>
                                        <td>{{$p->tgl_plng}}</td>
                                        <td>{{$p->kapasitas}}</td>
                                        <td>{{$p->tujuan}}</td>
                                        <td>{{$p->keterangan}}</td>
                                        <td>{{$p->status}}</td>
                                        <td>
                                        <a href="a_pengajuan/ubah_pengajuan/{{$p->id_pengajuan}}" class="btn btn-warning" role="button"><i class="bi bi-pencil-square"></i></a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus?')" href="/a_pengajuan/delete/{{$p->id_pengajuan}}" class="btn btn-danger" role="button"><i class="bi bi-x-square"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <br>

                    <h3>Ditolak</h3>
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
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pengajuan as $p)
                                @if($p->status=="Ditolak")
                                    <tr>
                                        <td>{{$p->nama_user}}</td>
                                        <td>{{$p->nama_driver}}</td>
                                        <td>{{$p->plat_nmr}}</td>
                                        <td>{{$p->tgl_brngkt}}</td>
                                        <td>{{$p->tgl_plng}}</td>
                                        <td>{{$p->kapasitas}}</td>
                                        <td>{{$p->tujuan}}</td>
                                        <td>{{$p->keterangan}}</td>
                                        <td>{{$p->status}}</td>
                                        <td>
                                        <a href="a_pengajuan/ubah_pengajuan/{{$p->id_pengajuan}}" class="btn btn-warning" role="button"><i class="bi bi-pencil-square"></i></a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus?')" href="/a_pengajuan/delete/{{$p->id_pengajuan}}" class="btn btn-danger" role="button"><i class="bi bi-x-square"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
