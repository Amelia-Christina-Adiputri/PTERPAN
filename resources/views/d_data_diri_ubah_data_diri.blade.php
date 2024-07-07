@extends('layouts.d_main')
@section('title','Ubah Data Diri')
@section('content')

<!-- FORM UPDATE DRIVER-->
@php
    $jns_sim = explode(',', $driver->jns_sim);
@endphp

<br>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="container-fluid d-flex justify-content-center align-items-top">
                <div class="card w-100">
                    <div class="card-header bg-dark d-flex justify-content-left">
                        <strong Class="text-light">UBAH DATA DRIVER</strong>
                    </div>
                    <div class="card-body">
                        <form action="/d_data_diri/update" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group w-50">
                                <label>Nama Driver</label>
                                <input type="text" name="nm_driver" class="form-control" value="{{$driver->name}}">
                            </div>
                            <label>Jenis SIM</label>
                            <div class="form-check">
                                <input type="checkbox" name="jns_sim[]" class="form-check-input" value="A" {{in_array('A', $jns_sim) ? 'checked':''}}><Label>A</Label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="jns_sim[]" class="form-check-input" value="B1" {{in_array('B1', $jns_sim) ? 'checked':''}}><Label>B1</Label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="jns_sim[]" class="form-check-input" value="B2" {{in_array('B2', $jns_sim) ? 'checked':''}}><Label>B2</Label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="jns_sim[]" class="form-check-input" value="C" {{in_array('C', $jns_sim) ? 'checked':''}}><Label>C</Label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="jns_sim[]" class="form-check-input" value="D" {{in_array('D', $jns_sim) ? 'checked':''}}><Label>D</Label>
                            </div>
                            <br>
                            <div>
                                <a href="/d_data_diri"><button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button></a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
