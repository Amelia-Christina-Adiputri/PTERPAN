@extends('layouts.a_main')
@section('title','Tambah Driver')
@section('content')

<!-- FORM INSERT DRIVER-->
    <form action="/a_driver/insert" method="POST">
        @csrf
        <div class="form-group w-100">
            <label>Nama Driver</label>
            <input type="text" name="nm_driver" class="form-control" placeholder="Masukkan Nama">
        </div>
        <label>Jenis SIM</label>
        <div class="form-check">
            <input type="checkbox" name="jns_sim[]" class="form-check-input" value="A"><Label>A</Label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="jns_sim[]" class="form-check-input" value="B1"><Label>B1</Label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="jns_sim[]" class="form-check-input" value="B2"><Label>B2</Label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="jns_sim[]" class="form-check-input" value="C"><Label>C</Label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="jns_sim[]" class="form-check-input" value="D"><Label>D</Label>
        </div>
        <div>
            <a href="/a_driver"><button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button></a>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
@endsection
