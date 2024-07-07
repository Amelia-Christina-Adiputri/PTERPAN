@extends('layouts.d_main')
@section('title','Data Diri')
@section('content')

<br>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Data Diri</h3>
                </div>
                <div class="card-body">
                    <!-- DATA DIRI -->
                    <table class="table table-borderless w-auto" >
                        <tr>
                            <td>Nama</td>
                            <td> : </td>
                            <td>{{$driver->name}}</td>
                        </tr>
                        <tr>
                            <td>Jenis SIM</td>
                            <td> : </td>
                            <td>{{$driver->jns_sim}}</td>
                        </tr>
                        <tr>
                            <td><a href="/d_data_diri/ubah"><button type="button" role="button" class="btn btn-dark">Ubah</button></a></td>
                        </tr>

                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
