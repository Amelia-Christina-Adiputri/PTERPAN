@extends('layouts.a_main')
@section('title','Daftar Driver')
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

<br>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Daftar Driver</h3>
                </div>
                <div class="card-body">

                <!-- Filter Data -->
                <div>
                    <form action="/a_driver_filter" method="GET">
                        @csrf
                        <label for="" class="mr-4">Tanggal Berangkat</label>
                        <label for="" class="ml-4">Tanggal Pulang</label> <br>
                        <input type="datetime-local" id="tgl_brngkt" name="tgl_brngkt">
                        <input type="datetime-local" id="tgl_plng" name="tgl_plng">
                        <input type="submit" value="Filter">
                    </form>
                </div>
                <br>



            <!-- BUTTON INSERT DRIVER -->
            <a href="/register" class="btn btn-dark" role="button">
                <i class="bi bi-plus"></i>Driver
            </a>
            <br><br>

                    <!-- TABEL DRIVER -->
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nama Driver</th>
                            <th scope="col">Jenis SIM</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($driver as $d)
                            <tr>
                            <td>{{$d->name}}</td>
                            <td>{{$d->jns_sim}}</td>
                            <td>
                                <a href="/a_driver/ubah_driver/{{$d->id}}" class="btn btn-warning" role="button"><i class="bi bi-pencil-square"></i></a>
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus?')" href="/a_driver/delete/{{$d->id}}" class="btn btn-danger" role="button"><i class="bi bi-x-square"></i></a>
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

@endsection
