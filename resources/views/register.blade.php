@extends('layouts.a_main')
@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
     <div class="card w-25">
        <div class="card-header bg-dark d-flex justify-content-center">
            <strong Class="text-light">FORM <span class="text-light">REGISTER</span></strong>
        </div>
        <div class="card-body">
            <form action="/simpan" method="POST">
                @csrf
                <div class="form-group">
                    <label>Role</label>
                    <div class="form-check">
                        <input type="radio" name="role" class="form-check-input" value="Admin"><Label>Admin</Label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="role" class="form-check-input" value="Driver" checked><Label>Driver</Label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="role" class="form-check-input" value="User"><Label>User</Label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Unit</label>
                    <select name="id_unit" class="form-control">
                        <option value="">--Unit--</option>
                            @foreach($unit as $u)
                                <option value="{{$u->id_unit}}">{{$u->nm_unit}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukan Nama" required>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukan E-mail" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-block">Daftarkan</button>
                </div>
            </form>
        </div>
    </div>
    </div>

@endsection
