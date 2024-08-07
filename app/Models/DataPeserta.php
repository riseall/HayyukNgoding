<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPeserta extends Model
{
    use HasFactory;

    protected $table = 'data_peserta';

    public function telepon(){
        return $this->hasOne('App\Models\Telepon', 'id_peserta');
    }
    
    public function jenis_kelamin(){
        return $this->belongsTo('App\Models\JenisKelamin', 'id_jenis_kelamin');
    }

    public function data_kelas(){
        return $this->belongsToMany('App\Models\DataKelas', 'pelatihan', 'id_peserta', 'id_kelas' );
    }

    public function pelatihan(){
        return $this->hasMany('App\Pelatihan', 'id_peserta' );
    }
}
