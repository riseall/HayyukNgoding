<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKelas extends Model
{
    use HasFactory;

    protected $table = "data_kelas";

    public function data_peserta(){
        return $this->belongsToMany('App\Models\DataPeserta', 'pelatihan', 'id_kelas', 'id_peserta' );
    }

    public function pelatihan(){
        return $this->hasMany('App\Models\Pelatihan', 'id_kelas' );
    }
}
