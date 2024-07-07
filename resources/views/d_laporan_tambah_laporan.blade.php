@extends('layouts.d_main')
@section('title','Tambah Laporan')
@section('content')

<br>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="container-fluid d-flex justify-content-center align-items-top">
                <div class="card w-100">
                    <div class="card-header bg-dark d-flex justify-content-left">
                        <strong Class="text-light">TAMBAH LAPORAN</strong>
                    </div>
                    <div class="card-body">
                        <!-- FORM TAMBAH PENGAJUAN-->

                        <form action="/d_laporan/insert/{{$id_pengajuan}}" method="POST">
                            @csrf
                            <div class="form-group w-50">
                                <label>Waktu</label>
                                <input type="datetime-local" name="waktu" class="form-control">
                            </div>
                            <div class="form-group w-50">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan">
                            </div>
                            <div class="form-group w-50">
                                <label>Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" placeholder="Masukkan Lokasi">
                            </div>
                            <div>
                                <a href="/d_laporan/{{$id_pengajuan}}"><button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button></a>
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
