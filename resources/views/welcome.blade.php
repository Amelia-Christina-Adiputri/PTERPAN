@php
    try {
        if(DB::connection()->getPdo()) {
            echo "Berhasil terkoneksi ke basis data.DB::connection()->getDatabaseName().";
        }
    } catch(Exception $e){
        echo "Gagal Terkoneksi" . $e;
    }
@endphp