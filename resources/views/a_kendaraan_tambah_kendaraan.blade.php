@extends('layouts.a_main')
@section('title','Tambah Kendaraan')
@section('content')

<br>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="container-fluid d-flex justify-content-center align-items-top">
                <div class="card w-100">
                    <div class="card-header bg-dark d-flex justify-content-left">
                        <strong Class="text-light">TAMBAH DATA KENDARAAN</strong>
                    </div>
                    <div class="card-body">
                        <!-- FORM INSERT KENDARAAN-->
                        <form action="/a_kendaraan/insert" method="POST">
                            @csrf
                            <div class="form-group w-50">
                                <label>Plat Nomor</label>
                                <input type="text" name="plat_nmr" class="form-control" placeholder="Masukkan Plat Nomor">
                            </div>
                            <div class="form-group w-100">
                                <label>Jenis</label>
                                <div class="form-group">
                                    <select name="jenis" class="form-control">
                                        <option value="">--Jenis Kendaraan--</option>
                                        <option value="SUV">SUV</option>
                                        <option value="MPV">MPV</option>
                                        <option value="Crossover">Crossover</option>
                                        <option value="Hatchback">Hatchback</option>
                                        <option value="Sedan">Sedan</option>
                                        <option value="Pickup">Pickup</option>
                                        <option value="Minivans">Minivans</option>
                                        <option value="Coupe">Coupe</option>
                                        <option value="Van">Van</option>
                                        <option value="Wagon">Wagon</option>
                                        <option value="Truck">Truck</option>
                                        <option value="Bus">Bus</option>
                                        <option value="Motor">Motor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group w-100">
                                <label>Merk</label>
                                <input type="text" name="merk" class="form-control" placeholder="Masukkan Merk">
                            </div>
                            <div class="form-group w-100">
                                <label>Warna</label>
                                <input type="text" name="warna" class="form-control" placeholder="Masukkan Warna">
                            </div>
                            <div class="form-group w-100">
                                <label>STNK</label>
                                <input type="text" name="stnk" class="form-control" placeholder="Masukkan Nomor STNK">
                            </div>
                            <div class="form-group w-100">
                                <label>Tahun</label>
                                <input type="number" name="tahun" class="form-control" placeholder="Masukkan Tahun">
                            </div>
                            <div class="form-group w-100">
                                <label>Kapasitas</label>
                                <input type="number" name="kapasitas" class="form-control" placeholder="Masukkan Kapasitas">
                            </div>
                            <div class="form-group w-100">
                                <label>CC</label>
                                <input type="number" name="cc" class="form-control" placeholder="Masukkan CC">
                            </div>
                            <label>Jenis SIM</label>
                            <div class="form-group">
                                <select name="jns_sim" class="form-control">
                                    <option value="">--Jenis SIM--</option>
                                    <option value="A">A</option>
                                    <option value="B1">B1</option>
                                    <option value="B2">B2</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                            <div>
                                <a href="/a_kendaraan"><button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button></a>
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
