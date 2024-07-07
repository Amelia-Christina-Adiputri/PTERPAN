@extends('layouts.a_main')
@section('title','Ubah Kendaraan')
@section('content')

<br>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="container-fluid d-flex justify-content-center align-items-top">
                <div class="card w-100">
                    <div class="card-header bg-dark d-flex justify-content-left">
                        <strong Class="text-light">UBAH DATA KENDARAAN</strong>
                    </div>
                    <div class="card-body">
                        <!-- FORM UBAH KENDARAAN-->
                        <form action="/a_kendaraan/update/{{$kendaraan->id_kendaraan}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group w-50">
                                <label>Plat Nomor</label>
                                <input type="text" name="plat_nmr" class="form-control" value="{{$kendaraan->plat_nmr}}">
                            </div>
                            <div class="form-group w-100">
                                <label>Jenis</label>
                                <div class="form-group">
                                    <select name="jenis" class="form-control">
                                        <option value="">--Jenis Kendaraan--</option>
                                        <option value="SUV" {{ ($kendaraan->jenis == 'SUV') ? 'selected':''}}>SUV</option>
                                        <option value="MPV" {{ ($kendaraan->jenis == 'MPV') ? 'selected':''}}>MPV</option>
                                        <option value="Crossover" {{ ($kendaraan->jenis == 'Crossover') ? 'selected':''}}>Crossover</option>
                                        <option value="Hatchback" {{ ($kendaraan->jenis == 'Hatchback') ? 'selected':''}}>Hatchback</option>
                                        <option value="Sedan" {{ ($kendaraan->jenis == 'Sedan') ? 'selected':''}}>Sedan</option>
                                        <option value="Pickup" {{ ($kendaraan->jenis == 'Pickup') ? 'selected':''}}>Pickup</option>
                                        <option value="Minivans" {{ ($kendaraan->jenis == 'Minivans') ? 'selected':''}}>Minivans</option>
                                        <option value="Coupe" {{ ($kendaraan->jenis == 'Coupe') ? 'selected':''}}>Coupe</option>
                                        <option value="Van" {{ ($kendaraan->jenis == 'Van') ? 'selected':''}}>Van</option>
                                        <option value="Wagon" {{ ($kendaraan->jenis == 'Wagon') ? 'selected':''}}>Wagon</option>
                                        <option value="Truck" {{ ($kendaraan->jenis == 'Truck') ? 'selected':''}}>Truck</option>
                                        <option value="Bus" {{ ($kendaraan->jenis == 'Bus') ? 'selected':''}}>Bus</option>
                                        <option value="Motor" {{ ($kendaraan->jenis == 'Motor') ? 'selected':''}}>Motor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group w-100">
                                <label>Merk</label>
                                <input type="text" name="merk" class="form-control" value="{{$kendaraan->merk}}">
                            </div>
                            <div class="form-group w-100">
                                <label>Warna</label>
                                <input type="text" name="warna" class="form-control" value="{{$kendaraan->merk}}">
                            </div>
                            <div class="form-group w-100">
                                <label>STNK</label>
                                <input type="text" name="stnk" class="form-control" value="{{$kendaraan->stnk}}">
                            </div>
                            <div class="form-group w-100">
                                <label>Tahun</label>
                                <input type="number" name="tahun" class="form-control" value="{{$kendaraan->tahun}}">
                            </div>
                            <div class="form-group w-100">
                                <label>Kapasitas</label>
                                <input type="number" name="kapasitas" class="form-control" value="{{$kendaraan->kapasitas}}">
                            </div>
                            <div class="form-group w-100">
                                <label>CC</label>
                                <input type="number" name="cc" class="form-control" value="{{$kendaraan->cc}}">
                            </div>
                            <label>Jenis SIM</label>
                            <div class="form-group">
                                <select name="jns_sim" class="form-control">
                                    <option value="A" {{ ($kendaraan->jns_sim == 'A') ? 'selected':''}}>A</option>
                                    <option value="B1" {{ ($kendaraan->jns_sim == 'B1') ? 'selected':''}}>B1</option>
                                    <option value="B2" {{ ($kendaraan->jns_sim == 'B2') ? 'selected':''}}>B2</option>
                                    <option value="C" {{ ($kendaraan->jns_sim == 'C') ? 'selected':''}}>C</option>
                                    <option value="D" {{ ($kendaraan->jns_sim == 'D') ? 'selected':''}}>D</option>
                                </select>
                            </div>
                            <div>
                                <a href="/a_kendaraan"><button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button></a>
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
