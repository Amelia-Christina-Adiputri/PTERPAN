@extends('layouts.p_main')
@section('title','Tambah Pengajuan')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <br>
            <div class="card w-100">
                <div class="card-header bg-dark d-flex justify-content-left">
                    <strong Class="text-light">TAMBAH PENGAJUAN</strong>
                </div>
                <div class="card-body">
                    <!-- FORM TAMBAH PENGAJUAN-->
                    <form action="/p_pengajuan/insert" method="POST">
                        @csrf
                        <div class="form-group w-50">
                            <label>Tanggal Berangkat</label>
                            <input type="datetime-local" name="tgl_brngkt" class="form-control" placeholder="Masukkan Tanggal Berangkat">
                        </div>
                        <div class="form-group w-50">
                            <label>Tanggal Pulang</label>
                            <input type="datetime-local" name="tgl_plng" class="form-control" placeholder="Masukkan Tanggal Pulang">
                        </div>
                        <div class="form-group w-50">
                            <label>Kapasitas</label>
                            <input type="number" name="kapasitas" class="form-control" placeholder="Masukkan Kapasitas">
                        </div>
                        <div class="form-group w-50">
                            <label>Tujuan</label>
                            <input type="text" name="tujuan" class="form-control" placeholder="Masukkan Tujuan">
                        </div>
                        <div class="form-group w-50">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan">
                        </div>
                        <div>
                            <a href="/p_home"><button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button></a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
