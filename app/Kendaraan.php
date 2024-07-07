<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table='kendaraan';
    protected $primaryKey = 'id_kendaraan';

    protected $fillable=[
        'id_kendaraan',
        'plat_nmr',
        'jenis',
        'merk',
        'warna',
        'stnk',
        'tahun',
        'kapasitas',
        'cc',
        'jns_sim'
    ];
}
