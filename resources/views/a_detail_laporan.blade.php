@extends('layouts.a_main')
@section('title','Detail Laporan')
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
                    <h3>Detail Laporan</h3>
                </div>
                <div class="card-body">
                    <!-- TABEL LAPORAN -->
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Waktu</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Waktu Isi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($laporan as $l)
                            <tr>
                            <td>{{$l->waktu}}</td>
                            <td>{{$l->keterangan}}</td>
                            <td>{{$l->lokasi}}</td>
                            <td>{{$l->wkt_isi}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <a href="/a_laporan"><button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
