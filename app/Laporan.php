<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table='laporan';
    protected $primaryKey = 'id_laporan';

    protected $fillable=[
        'id_laporan',
        'id_pengajuan',
        'waktu',
        'keterangan',
        'lokasi',
        'wkt_isi',
    ];
}
