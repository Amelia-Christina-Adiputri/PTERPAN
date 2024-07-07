<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table='pengajuan';
    protected $primaryKey = 'id_pengajuan';

    protected $fillable=[
        'id_pengajuan',
        'id_user',
        'id_driver',
        'id_kendaraan',
        'tgl_brngkt',
        'tgl_plng',
        'kapasitas',
        'tujuan',
        'keterangan',
        'status'
    ];
}
