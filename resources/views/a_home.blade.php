@extends('layouts.a_main')
@section('title','Home')
@section('content')

<!-- ALERT -->
<div>
    @if(session('alert'))
    @if(session('alert')=='Data telah berhasil dihapus!')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session('alert')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('alert')=='Pengajuan telah berhasil ditolak!')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session('alert')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @endif
</div>

<br>


<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Daftar Pengajuan</h3>
                </div>
                <div class="card-body">
                    <!-- TABEL PENGAJUAN -->
                    @if(count($pengajuan)!=null)
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama User</th>
                                    <th scope="col">Nama Unit</th>
                                    <th scope="col">Tanggal Berangkat</th>
                                    <th scope="col">Tanggal Pulang</th>
                                    <th scope="col">Kapasitas</th>
                                    <th scope="col">Tujuan</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($pengajuan as $p)
                                <tr>
                                    <td>{{$p->nama_user}}</td>
                                    <td>{{$p->nm_unit}}</td>
                                    <td>{{$p->tgl_brngkt}}</td>
                                    <td>{{$p->tgl_plng}}</td>
                                    <td>{{$p->kapasitas}}</td>
                                    <td>{{$p->tujuan}}</td>
                                    <td>{{$p->keterangan}}</td>
                                    <td>
                                    <a href="/a_home/terima_pengajuan/{{$p->id_pengajuan}}" class="btn btn-success" role="button"><i class="bi bi-check-square"></i></a>
                                    <a data-toggle="modal" data-target="#tolak_pengajuan" class="btn btn-danger" role="button"><i class="bi bi-x-square"></i></a>
                                    <div class="modal fade" id="tolak_pengajuan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="tolak_pengajuan" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambah_prosesLabel">Tolak Pengajuan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/a_home/tolak/{{$p->id_pengajuan}}" method="POST">
                                                @csrf
                                                <div class="form-group w-75">
                                                    <label>Alasan</label>
                                                    <input type="Text" name="alasan" class="form-control" placeholder="Masukkan alasan penolakan pengajuan">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button onclick="return confirm('Apakah anda yakin ingin menolak?')" class="btn btn-danger" role="button" type="submit">Tolak</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <p>Tidak Terdapat Pengajuan!</p>
                    @endif
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card-header bg-white">
                    <h3>Jadwal Supir</h3>
                </div>
                <div class="card-body">
                    <!-- KALENDER -->
                    @if(count($jadwal)!=null)
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Nama User</th>
                                <th scope="col">Nama Unit</th>
                                <th scope="col">Nama Driver</th>
                                <th scope="col">Tanggal Berangkat</th>
                                <th scope="col">Tanggal Pulang</th>
                                <th scope="col">Kapasitas</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Keterangan</th>
                                </tr>
                            </thead>

                        <tbody>
                            @foreach($jadwal as $j)
                            <tr>
                                <td>{{$j->nama_user}}</td>
                                <td>{{$j->nm_unit}}</td>
                                <td>{{$j->nama_driver}}</td>
                                <td>{{$j->tgl_brngkt}}</td>
                                <td>{{$j->tgl_plng}}</td>
                                <td>{{$j->kapasitas}}</td>
                                <td>{{$j->tujuan}}</td>
                                <td>{{$j->keterangan}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                        </table>
                    @else
                        <p>Tidak Terdapat Penjadwalan!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
