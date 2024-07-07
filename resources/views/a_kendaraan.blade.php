@extends('layouts.a_main')
@section('title','Daftar Kendaraan')
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
        @elseif(session('alert')=='Tanggal berangkat harus lebih kecil atau sama dengan tanggal pulang!')
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
                    <h3>Daftar Kendaraan</h3>
                </div>
                <div class="card-body">
                    <!-- Filter Data -->
                    <div>
                        <form action="/a_kendaraan_filter" method="GET">
                            @csrf
                            <label for="" class="mr-4">Tanggal Berangkat</label>
                            <label for="" class="ml-4">Tanggal Pulang</label> <br>
                            <input type="datetime-local" id="tgl_brngkt" name="tgl_brngkt">
                            <input type="datetime-local" id="tgl_plng" name="tgl_plng">
                            <input type="submit" value="Filter">
                        </form>
                    </div>
                    <br>


                    <!-- BUTTON INSERT KENDARAAN -->
                    <a href="/a_kendaraan/tambah_kendaraan" class="btn btn-dark" role="button">
                        <i class="bi bi-plus"></i>Kendaraan
                    </a>
                    <br><br>

                    <!-- TABEL KENDARAAN -->
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Plat Nomor</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Merk</th>
                                <th scope="col">Warna</th>
                                <th scope="col">STNK</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Kapasitas</th>
                                <th scope="col">cc</th>
                                <th scope="col">Jenis SIM</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kendaraan as $k)
                                <tr>
                                    <td>{{$k->plat_nmr}}</td>
                                    <td>{{$k->jenis}}</td>
                                    <td>{{$k->merk}}</td>
                                    <td>{{$k->warna}}</td>
                                    <td>{{$k->stnk}}</td>
                                    <td>{{$k->tahun}}</td>
                                    <td>{{$k->kapasitas}}</td>
                                    <td>{{$k->cc}}</td>
                                    <td>{{$k->jns_sim}}</td>
                                <td>
                                    <a href="/a_kendaraan/ubah_kendaraan/{{$k->id_kendaraan}}" class="btn btn-warning" role="button"><i class="bi bi-pencil-square"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus?')" href="/a_kendaraan/delete/{{$k->plat_nmr}}" class="btn btn-danger" role="button"><i class="bi bi-x-square"></i></a>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
