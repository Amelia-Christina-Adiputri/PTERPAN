@extends('layouts.p_main')
@section('title','Daftar Driver')
@section('content')

<!-- ALERT -->
<div>
    @if(session('alert'))
       @if(session('alert')=='Tanggal berangkat harus lebih kecil atau sama dengan tanggal pulang!')
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
                    <h3>Daftar Driver</h3>
                </div>
                <div class="card-body">
                    <!-- Filter Data -->
                    <div>
                        <form action="/p_driver_filter" method="GET">
                            @csrf
                            <label for="" class="mr-4">Tanggal Berangkat</label>
                            <label for="" class="ml-4">Tanggal Pulang</label> <br>
                            <input type="datetime-local" id="tgl_brngkt" name="tgl_brngkt">
                            <input type="datetime-local" id="tgl_plng" name="tgl_plng">
                            <input type="submit" value="Filter">
                        </form>
                    </div>
                    <br>
                    <!-- TABEL KENDARAAN -->
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nama Driver</th>
                                <th scope="col">Jenis SIM</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($driver as $d)
                                <tr>
                                    <td>{{$d->name}}</td>
                                    <td>{{$d->jns_sim}}</td>
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
